<?php
session_start();
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
$user_name = $_SESSION['name'];
if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'dash';
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Qasem Admin</title>
        <link rel="stylesheet" href="css/style.css" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
        <script language="javascript" type="text/javascript" src="tiny.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="menu">
                <h3><i>Menu</i></h3>
                <a href="../" target="_blank">Show My Website</a>
                <a href="?p=dash">Dashboard</a>
                <a href="?p=blog">Blog</a>
                <a href="?p=contact">Contact</a>
                <a href="?p=user">User Information</a>
            </div>
            <div class="content">
                <div class="bar">
                    <p>Hello, <?php echo($user_name); ?></p>
                    <p><a href="logout.php">Logout</a></p>
                </div>
                <?php
                    if($page == 'dash'){
                        include('dash.php');
                    }
                    else if($page == 'blog'){
                        include('blog.php');
                    }
                    else if($page == 'add_blog'){
                        include('add_blog.php');
                    }
                    else if($page == 'blog_edit'){
                        include('edit_blog.php');
                    }
                    else if($page == 'blog_delete'){
                        include('del_blog.php');
                    }
                    else if($page == 'del_blog_action'){
                        include('del_blog_action.php');
                    }
                    else if($page == 'contact'){
                        include('contact.php');
                    }
                    else if($page == 'con_show'){
                        include('con_show.php');
                    }
                    else if($page == 'con_del'){
                        include('con_del.php');
                    }
                    else if($page == 'del_con_action'){
                        include('del_con_action.php');
                    }
                    else if($page == 'user'){
                        include('user.php');
                    }
                    else{
                        include('dash.php');
                    }
                ?>
            </div>
        </div>
    </body>
</html>