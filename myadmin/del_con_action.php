<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$id=$_GET['id'];
$del="DELETE FROM `contact` WHERE `contact`.`con_id` = $id";
$run=mysqli_query($con,$del);
if($run){ ?>
    <h3>Delete succsessfull.Go to <a href="?p=contact">Contact</a> page.</h3>
<?php }else{
    echo ('Something is wrong.Please come Back to <a href="?p=contact>contact</a> page."');
}
#}
?>