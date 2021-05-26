<?php
include('includes/db.php');
$flag=0;
if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $flag=1;
    }else{
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $flag=1;
        }else{
            $email=test_input($_POST['email']);
        }
    }
    if(empty($_POST['pass'])){
        $flag=1;
    }else{
        $pass=test_input($_POST['pass']);
    }
    if($flag == 0){
        $get="select * from user where user_email='$email'";
        $run=mysqli_query($con,$get);
        $num=mysqli_num_rows($run);
        if($num != 0){
            $pass=md5('!@fgh34'.$pass.'%^hfgn#');
            $row=mysqli_fetch_array($run);
            $pass_data=$row['user_pass'];
            if($pass == $pass_data){
                $name=$row['user_name'];
                session_start();
                $_SESSION['name']=$name;
                header('Location: index.php');
            }else{
                $flag=1;
            }
        }else{
            $flag=1;
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container-login">
            <h1><i>Login Form</i></h1>
            <form method="post">
                <p>Email</p>
                <input type="email" name="email" required />
                <p>Password</p>
                <input type="password" name="pass" required />
                <p></p>
                <input type="submit" name="submit" value="Login" />
            </form>
        </div>
    </body>
</html>