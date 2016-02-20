<?php
  class BlogPost
  {
    private $registry;
    private $id;
    private $title;
    private $content;
    private $authorid;
    private $dt;

    public function __construct($registry) {
      $this->registry = $registry;
      $this->dt = date('Y-m-d H:i:s');
    }

    public function setID($value) {
      $this->id = $value;
    }

    public function setContent($value) {
      $this->content = $value;
    }

    public function setTitle($value) {
      $this->title = $value;
    }

    public function setAuthorID($value) {
      $this->authorid = $value;
    }

    public function getDriver() {
      $driverName = $this->registry->db->getAttribute(PDO::ATTR_DRIVER_NAME);
      return $driverName;
    }

    public function getHeadOfPosts() {
      $res = array();
      $STH = $this->registry->db->prepare("SELECT e.id as id, title, concat(substring(e.text, 1, 15), '...') as text, date, authorid, username FROM entries e, authors a WHERE e.authorid = a.id ORDER BY date DESC LIMIT 5");
      $STH->execute();
      $STH->setFetchMode(PDO::FETCH_CLASS, "BP");
      $res = $STH->fetchAll(PDO::FETCH_CLASS);

      return $res;
    }

    public function getPost() {
      $res = null;
      $this->registry->db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
      $STH = $this->registry->db->prepare("SELECT * FROM entries WHERE id=:id");
      $data = array(':id' => $this->id);
      // $STH->bindParam(':authorid', $this->authorid, PDO::PARAM_INT   PARAN_STR);
      // $STH->execute();
      $STH->execute($data);
      //while ($row = $STH->fetch(PDO::FETCH_OBJ)) {
      $STH->setFetchMode(PDO::FETCH_CLASS, "BP");
      while ($row = $STH->fetch(PDO::FETCH_CLASS)) {
        $res = $row;
      }
      return $res;
    }

    public function getPostCount() {
      $STH = $this->registry->db->query('SELECT count(ID) FROM entries');
      $STH->bindColumn(1, $max);
      $STH->fetch(PDO::FETCH_BOUND);
      echo "######### max $max<br />";
      return $max;

      $STH = $this->registry->db->prepare('SELECT count(ID) FROM entries');
      if ($STH->execute()) {
        $STH->bindColumn(1, $max);
        $STH->fetch(PDO::FETCH_BOUND);
        #$max = $STH->rowCount();
        var_dump("--- $max ---");
        return $max;
      }
      return false;
    }

    public function addPost() {
      # the data we want to insert
      $data = array( ':title' => $this->title, ':text' => $this->content, ':authorid' => $this->authorid, ':date' => $this->dt);

      $STH = $this->registry->db->prepare("INSERT INTO entries (title, text, authorid, date) value (:title, :text, :authorid, :date)");
      if ($STH->execute($data))
      // if ($STH->execute())
        return $this->registry->db->lastInsertId();
      return false;
    }
  }
