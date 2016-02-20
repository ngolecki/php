<h1><?php echo $blog_heading; ?></h1>

<p><?php echo "action is " . $action; ?></p>

<p><?php if (isset($blog_result)) echo "last result: ".$blog_result; ?></p>

<p><?php echo "number of posts: ".$blog_count; ?></p>
<?php
echo __FILE__."<br />"
 ?>
<?php
  foreach ($blog_content as $bp) {
    echo "Post $bp->id <b><a href=view?id=".$bp->id.">".$bp->title."</a></b><br />".$bp->text."<br />From: ".$bp->username." / ".$bp->date."<br /><br />";
  }
?>
<p><?php echo "PDO driver used: ".$driver_name; ?></p>
