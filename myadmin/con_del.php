<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$id = $_GET['id'];
$get = "select * from contact where con_id='$id'";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$name = $row['con_name'];
?>
<h1><i>Delete Contact</i></h1>

<h2>Are you sure? you want to delete <a target="_blank" href="?p=con_show&id=<?php echo ($id); ?>"><?php echo ($name); ?></a></h2>

<div>
    <a href="?p=del_con_action&id=<?php echo ($id); ?>">Yes, I'm Sure.Delete this contact.</a>
    <p></p>
    <a href="?p=contact">No, Come back to contact page soon!</a>
</div>