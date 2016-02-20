<?php

Class blogController Extends baseController {

  public $bp = null;

  public function __construct($registry) {
    $this->registry = $registry;
    $this->bp = new BlogPost($this->registry);
  }

  public function index()
  {
    $count = $this->bp->getPostCount();
    $res = $this->bp->getHeadOfPosts();
    $this->registry->template->blog_heading = 'This is the blog Index';
    $this->registry->template->blog_count = $count;
    $this->registry->template->blog_content = $res;
    $this->registry->template->driver_name = $this->bp->getDriver();
    $this->registry->template->action = "123"; // $this->registry->router->controller; // action;
    $this->registry->template->show('blog_index');

  }

  public function form()
  {
    $this->registry->template->show('blog_form');
  }

  public function save()
  {
    echo "method is save<br >";
    $this->registry->request->load('content');
    $this->registry->request->load('title');

    $this->bp->setContent($this->registry->request->content);
    $this->bp->setTitle($this->registry->request->title);
    $this->bp->setAuthorID(1);
    $res = $this->bp->addPost();

    $this->registry->template->blog_result = $res;
    $this->index();
  }

  public function view(){
    $id = '';
    if (isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
    }
  	/*** should not have to call this here.... FIX ME ***/
    $this->bp->setID($id);
    $data = $this->bp->getPost();

  	$this->registry->template->blog_heading = 'This is the blog heading';
  	$this->registry->template->blog_content = 'This is the blog content: ';
    $this->registry->template->blog_data = $data;
  	$this->registry->template->show('blog_view');
  }

}
?>
