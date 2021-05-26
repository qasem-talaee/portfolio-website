<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$id=$_GET['id'];
$del="DELETE FROM `blog` WHERE `blog`.`blog_id` = $id";
$run=mysqli_query($con,$del);
if($run){ ?>
    <h3>Delete succsessfull.Go to <a href="?p=blog">Blog</a> page.</h3>
<?php }else{
    echo ('Something is wrong.Please come Back to <a href="?p=blog>Blog</a> page."');
}
#}
?>