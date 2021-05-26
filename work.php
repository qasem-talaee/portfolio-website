<?php
include('includes/db.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    <meta name="description" content="سایت شخصی قاسم طلایی-Qasem Talaee personal website" />
	    <meta name="keywords" content="قاسم,شخصی,طلایی,قاسم طلایی,طراح سایت,برنامه نویس" />
	    <meta name="author" content="Qasem Talaee" />
        <title>Qasem Talaee-work</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">

            <!-- blog row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./works --all</p>
                </div>
                <div class="column">
                    <p class="margin">-- <a class="white" href="index.php">Get back to Home</a></p>
                    <?php
                    $get = "select * from blog where blog_status='p' and blog_show=1 order by blog_id desc";
                    $run = mysqli_query($con, $get);
                    while($row = mysqli_fetch_array($run)){
                        $id = $row['blog_id'];
                        $title = $row['blog_title'];
                        $date = $row['blog_date']; ?>
                        <p>- <i><?php echo($title); ?></i> [ <a class="white" href="detail.php?id=<?php echo ($id); ?>" target="_blank">Read More... </a> ] <span><?php echo($date); ?></span></p>
                    <?php } ?>
                    <p class="margin">-- <a class="white" href="index.php">Get back to Home</a></p>
                </div>
            </div>
            <!-- blog row -->

            <?php include('includes/footer.php') ?>

        </div>
    </body>
</html>