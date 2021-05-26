<?php
include('includes/db.php');
$name = $email = $msg = $msgerr = "";
$flag = 1;
$flag_send = 0;
if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $flag = 0;
        $msgerr .= '--Please enter your name--';
    }else{
        $name = test_input($_POST['name']);
    }
    if(empty($_POST['email'])){
        $flag = 0;
        $msgerr .= '--Please enter your email--';
    }else{
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $flag = 0;
            $msgerr .= '--Please enter a valid email address--';
        }else{
            $email = test_input($_POST['email']);
        }
    }
    if(empty($_POST['message'])){
        $flag = 0;
        $msgerr .= '--Please enter your message--';
    }else{
        $msg = test_input($_POST['message']);
    }
    if($flag == 1){
        $insert = "INSERT INTO `contact` (`con_id`, `con_name`, `con_email`, `con_message`, `con_status`, `con_date`) VALUES (NULL, '$name', '$email', '$msg', '0', NOW())";
        $run = mysqli_query($con, $insert);
        if($run){
            $flag_send = 1;
        }else{
            $flag_send = 2;
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    <meta name="description" content="سایت شخصی قاسم طلایی-Qasem Talaee personal website" />
	    <meta name="keywords" content="قاسم,شخصی,طلایی,قاسم طلایی,طراح سایت,برنامه نویس" />
	    <meta name="author" content="Qasem Talaee" />
        <title>Qasem Talaee</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">

            <?php
            if($flag_send == 1){ ?>
                <!-- post row -->
                <div class="cloumn">
                    <div class="row">
                        <p class="green">qasem:~$</p>
                        <p class="blue">./sendMessage</p>
                    </div>
                    <div class="">
                        <p class="green">Your message has been successfully registered. I will contact you soon.</p>
                    </div>
                </div>
                <!-- post row -->
            <?php }
            if($flag_send == 2){ ?>
                <!-- post row -->
                <div class="cloumn">
                    <div class="row">
                        <p class="green">qasem:~$</p>
                        <p class="blue">./sendMessage</p>
                    </div>
                    <div class="">
                        <p class="red">Somethings wrong.Please try again later.</p>
                    </div>
                </div>
                <!-- post row -->
            <?php }
            if($flag == 0){ ?>
                <!-- post row -->
                <div class="cloumn">
                    <div class="row">
                        <p class="green">qasem:~$</p>
                        <p class="blue">./sendMessage</p>
                    </div>
                    <div class="">
                        <p class="red"><?php echo($msgerr); ?></p>
                    </div>
                </div>
                <!-- post row -->
            <?php } ?>

            <!-- ls row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">ls</p>
                </div>
                <div class="row">
                    <p>about</p>
                    <p>social</p>
                    <p>skills</p>
                    <p>favorites</p>
                    <p>works</p>
                    <p>blog</p>
                    <p>contact</p>
                    <p class="green">profile.png</p>
                </div>
            </div>
            <!-- ls row -->

            <!-- profile row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">sudo apt install imagemagick ; display profile.png</p>
                </div>
                <div class="row">
                    <img src="images/profile.png" />
                </div>
            </div>
            <!-- profile row -->

            <!-- about row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./about</p>
                </div>
                <div class="row">
                    <p>Hello. I am Qasem Talaee and I am <?php echo(date('Y')-1998) ?> years old, an electrical engineer in the field of control, and I continue to do this because of my great interest in programming. I am happy to have a good cooperation with you. 
                    I have learned all my programming knowledge as an apprentice and I continue to learn every day because I am very interested in this job and I see my future in this profession.
                    </p>
                </div>
            </div>
            <!-- about row -->

            <!-- social row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./social -v</p>
                </div>
                <div class="column">
                    <div class="row">
                        <p>Github : <a class="white" href="https://github.com/qasem-talaee/" target="_blank">https://github.com/qasem-talaee/</a></p>
                    </div>
                    <div class="row">
                        <p>Instagram : <a class="white" href="https://www.instagram.com/qasem_talaee/" target="_blank">https://www.instagram.com/qasem_talaee/</a></p>
                    </div>
                    <div class="row">
                        <p>Telegram : <a class="white" href="https://telegram.me/qasem_talaee/" target="_blank">https://telegram.me/qasem_talaee/</a></p>
                    </div>
                    <div class="row">
                        <p>CodeWars : <a class="white" href="https://www.codewars.com/users/qasem-talaee/" target="_blank">hhttps://www.codewars.com/users/qasem-talaee/</a></p>
                    </div>
                </div>
            </div>
            <!-- social row -->

            <!-- social row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./skills</p>
                </div>
                <div class="column">
                    <div class="">
                        <p>- OS</p>
                        <div class="margin">
                            <p>-- Ubuntu Mate</p>
                        </div>
                        <p>- Programming Languages</p>
                        <div class="margin">
                            <p>-- PHP</p>
                            <p>-- Python</p>
                            <p>-- SQL</p>
                            <p>-- Dart</p>
                            <p>-- Bash</p>
                        </div>
                        <p>- Framworks</p>
                        <div class="margin">
                            <p>-- Django</p>
                            <p>-- Flutter</p>
                            <p>-- PyQt5</p>
                        </div>
                        <p>- Design Patterns</p>
                        <div class="margin">
                            <p>-- MVC</p>
                        </div>
                        <p>- DB Management System</p>
                        <div class="margin">
                            <p>-- MySQL</p>
                        </div>
                        <p>- Version Control</p>
                        <div class="margin">
                            <p>-- Git</p>
                        </div>
                        <p>- Others</p>
                        <div class="margin">
                            <p>-- Html & CSS</p>
                            <p>-- Ajax</p>
                            <p>-- API</p>
                            <p>-- Json</p>
                            <p>-- Web scraping with python</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- social row -->

            <!-- favorites row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./favorites</p>
                </div>
                <div class="row">
                    <p>Programming</p>
                    <p>Learning-new-things</p>
                    <p>Web-browsing</p>
                    <p>Mountaineering</p>
                    <p>Music</p>
                    <p>Movies&series</p>
                </div>
            </div>
            <!-- favorites row -->

            <!-- works row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./works --top</p>
                </div>
                <div class="column">
                <?php
                $get = "select * from blog where blog_status='p' and blog_show=1 order by blog_id desc limit 10";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['blog_id'];
                    $title = $row['blog_title'];
                    $date = $row['blog_date']; ?>
                    <p>- <i><?php echo($title); ?></i> [ <a class="white" href="detail.php?id=<?php echo ($id); ?>" target="_blank">Read More... </a> ] <span><?php echo($date); ?></span></p>
                <?php } ?>
                    <p class="margin">-- <a target="_blank" class="white" href="work.php">View All Works</a></p>
                </div>
            </div>
            <!-- works row -->

            <!-- blog row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./blog --latest</p>
                </div>
                <div class="column">
                <?php
                $get = "select * from blog where blog_status='b' and blog_show=1 order by blog_id desc limit 10";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['blog_id'];
                    $title = $row['blog_title'];
                    $date = $row['blog_date']; ?>
                    <p>- <i><?php echo($title); ?></i> [ <a class="white" href="detail.php?id=<?php echo ($id); ?>" target="_blank">Read More... </a> ] <span><?php echo($date); ?></span></p>
                <?php } ?>
                    <p class="margin">-- <a class="white" href="blog.php" target="_blank">View All Blogs</a></p>
                </div>
            </div>
            <!-- blog row -->

            <!-- contact row -->
            <div class="cloumn">
                <div class="row">
                    <p class="green">qasem:~$</p>
                    <p class="blue">./conatct</p>
                </div>
                <div class="column">
                    <p>- Phone Number</p>
                    <div class="margin">
                        <p>-- +989186423054</p>
                    </div>
                    <p>- Email</p>
                    <div class="margin">
                        <p>-- <a class="white" href="mailto:ghasem.talaee1375@gmail.com">ghasem.talaee1375@gmail.com</a></p>
                    </div>
                    <p>- Location</p>
                    <div class="margin">
                        <p>-- Middle East / Iran / Markazi State / Khomein</p>
                    </div>
                    <form method="POST">
                        <p>- Contact Form</p>
                        <div class="margin">
                            <p>-- Your Name : <input name="name" type="text" value="<?php echo($name); ?>"/></p>
                        </div>
                        <div class="margin">
                            <p>-- Your Email : <input name="email" type="email" value="<?php echo($email); ?>"/></p>
                        </div>
                        <div class="margin">
                            <p>-- Your Message : <textarea name="message" rows="8"><?php echo($msg); ?></textarea></p>
                        </div>
                        <div class="margin">
                            <p>-- <button type="submit" name="submit">Send</button></p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- contact row -->

            <?php include('includes/footer.php') ?>

        </div>
    </body>
</html>