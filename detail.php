<?php
include('includes/db.php');
$id = $_GET['id'];
$get = "select * from blog where blog_id=$id";
$run = mysqli_query($con, $get);
if(mysqli_num_rows($run) == 0){
    header("Location: 404.php");
}else{
    $row = mysqli_fetch_array($run);
    if($row['blog_show'] == 1){
        $title = $row['blog_title'];
        $status = $row['blog_status'];
        $img = $row['blog_img'];
        $meta_desc = $row['blog_meta_desc'];
        $key = $row['blog_keyword'];
        $date = $row['blog_date'];
        $content = $row['blog_content'];
    }else{
        header("Location: 404.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    <meta name="description" content="<?php echo($meta_desc); ?>" />
	    <meta name="keywords" content="<?php $key_meta=explode('--',$key);for($i=0;$i<count($key_meta);$i++){echo($key_meta[$i]);if($i != count($key_meta)-1){echo(',');}} ?>" />
	    <meta name="author" content="Qasem Talaee" />
        <title>Qasem Talaee-<?php echo($title); ?></title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">

            <!-- blog row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <?php
                    if($status == 'p'){ ?>
                        <p class="blue">./works -t '<?php echo($title); ?>'</p>
                    <?php }else{ ?>
                        <p class="blue">./blog -t '<?php echo($title); ?>'</p>
                    <?php } ?>
                </div>
                <div class="column">
                    <p class="margin">-- <a class="white" href="index.php">Get back to Home</a></p>
                    <p class="date"><i><?php echo($date); ?></i></p>
                    <img src="images/<?php echo($img); ?>" />
                    <p><?php echo($content); ?></p>
                    <p class="margin">-- <a class="white" href="index.php">Get back to Home</a></p>
                </div>
            </div>
            <!-- blog row -->

            <?php include('includes/footer.php') ?>

        </div>
    </body>
</html>