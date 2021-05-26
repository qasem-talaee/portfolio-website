<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$user_name=$_SESSION['name'];
$get="select * from user where user_name='$user_name'";
$run=mysqli_query($con,$get);
$row=mysqli_fetch_array($run);
$id=$row['user_id'];
$name=$row['user_name'];
$email=$row['user_email'];
$pass_get=$row['user_pass'];
$flag=0;$flag_send=0;
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $old_pass=$_POST['old_pass'];
    #get pass
    if(empty($_POST['old_pass'])){
        $pass=$pass_get;
    }else{
        if($pass_get != md5('!@fgh34'.$old_pass.'%^hfgn#')){
            $flag=1;
        }else{
            if($_POST['new_pass'] != $_POST['new_pass_again']){
                $flag=1;
            }else{
                $pass=md5('!@fgh34'.$_POST['new_pass'].'%^hfgn#');
            }
        }
    }
    $update="UPDATE `user` SET `user_name` = '$name', `user_email` = '$email', `user_pass` = '$pass' WHERE `user`.`user_id` = $id";
    $run=mysqli_query($con,$update);
    if($run){
        $flag_send=1;
        session_destroy();
    }else{
        $flag=1;
    }
}
?>
<h1><i>User</i></h1>

<p>-- Change your information</p>

<form method="post" action="?p=user">
    <p>Name</p>
    <input type="text" name="name" value="<?php echo($name); ?>" required/>
    <p>Email</p>
    <input type="email" name="email" value="<?php echo($email); ?>" required/>
    <p>-- If you don't want to change your password, Leave these inputs blank.</p>
    <p>Old password</p>
    <input type="password" name="old_pass" />
    <p>New password</p>
    <input type="password" name="new_pass" />
    <p>Retype New password</p>
    <input type="password" name="new_pass_again" />
    <p></p>
    <input type="submit" name="submit" value="Change" />
</form>