<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$id = $_GET['id'];
$get = "select * from blog where blog_id='$id'";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$title = $row['blog_title'];
?>
<h1><i>Delete Blog</i></h1>

<h2>Are you sure? you want to delete <a target="_blank" href="../detail.php?id=<?php echo ($id); ?>"><?php echo ($title); ?></a></h2>

<div>
    <a href="?p=del_blog_action&id=<?php echo ($id); ?>">Yes, I'm Sure.Delete this blog.</a>
    <p></p>
    <a href="?p=blog">No, Come back to blog page soon!</a>
</div>