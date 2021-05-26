<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$id = $_GET['id'];
$get = "select * from contact where con_id=$id";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$name = $row['con_name'];
$email = $row['con_email'];
$date = $row['con_date'];
$msg = $row['con_message'];
$status = $row['con_status'];
if(isset($_POST['submit'])){
    $status = $_POST['status'];
    $update = "UPDATE `contact` SET `con_status` = '$status' WHERE `contact`.`con_id` = $id";
    $run = mysqli_query($con, $update);
}
?>
<h1><i>Details of Contact</i></h1>

<p>-- Name</p>
<p><?php echo($name); ?></p>
<p>-- Email</p>
<p><?php echo($email); ?></p>
<p>-- Date</p>
<p><?php echo($date); ?></p>
<p>-- Message</p>
<p><?php echo($msg); ?></p>
<p>-- Change Status</p>
<form method="post" action="?p=con_show&id=<?php echo($id); ?>">
    <select name="status">
        <option value="0" <?php if($status == 1){echo('selected');} ?>>Don't answer</option>
        <option value="1" <?php if($status == 1){echo('selected');} ?>>Answered</option>
    </select>
    <p></p>
    <input type="submit" name="submit" value="Change" />
</form>