<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/image_upload.php');
include('includes/db.php');
$id=$_GET['id'];
$get="select * from blog where blog_id=$id";
$run=mysqli_query($con,$get);
$row=mysqli_fetch_array($run);
$title=$row['blog_title'];
$img_get=$row['blog_img'];
$meta_desc=$row['blog_meta_desc'];
$key=$row['blog_keyword'];
$status=$row['blog_status'];
$show=$row['blog_show'];
$content=$row['blog_content'];
$content = str_replace('""', '`', $content);
$flag=0;
if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $status=$_POST['status'];
    $show=$_POST['show'];
    $meta_desc=$_POST['meta_desc'];
    $key=$_POST['key'];
    $content=$_POST['content'];
    $content = str_replace('\'', '___', $content);
    #get image
    if($_FILES['img']['name'] == ""){
        $img_new=$img_get;
    }else{
        $img = image_upload('img', '../images/', 5000000);
        $img_new=$img[1];
    }
    $update="UPDATE `blog` SET `blog_title` = '$title', `blog_img` = '$img_new', `blog_content` = '$content', `blog_meta_desc` = '$meta_desc', `blog_keyword` = '$key', `blog_status` = '$status', `blog_show` = '$show' WHERE `blog`.`blog_id` = $id";
    $run_update=mysqli_query($con,$update);
    if($run_update){
        $flag=2;
    }else{
        $flag=1;
    }
}
?>

<h1><i>Add New Blog</i></h1>

<p>-- Add New</p>
<form method="post" enctype="multipart/form-data" action="?p=blog_edit&id=<?php echo($id); ?>">
    <p>Title</p>
    <input type="text" name="title" value="<?php echo($title); ?>"/>
    <p>Used Image</p>
    <img width="30%" height="auto" src="../images/<?php echo($img_get); ?>" />
    <p>Image</p>
    <p>-- If you don't want to change image, release this input empty.</p>
    <input type="file" name="img" />
    <p>Status</p>
    <select name="status">
        <option value='b' <?php if($status == 'b'){echo('selected');} ?>>Blog</option>
        <option value='p' <?php if($status == 'p'){echo('selected');} ?>>Work</option>
    </select>
    <p>Show</p>
    <select name="show">
        <option value="0" <?php if($show == 0){echo('selected');} ?>>Don't Show</option>
        <option value="1" <?php if($show == 1){echo('selected');} ?>>Show</option>
    </select>
    <p>SEO Keyword</p>
    <p>-- Separate keywords with two Dash</p>
    <textarea name="key" rows="10" placeholder="key1--key2--key3"><?php echo($key); ?></textarea>
    <p>SEO Descroption</p>
    <textarea name="meta_desc" rows="10"><?php echo($meta_desc); ?></textarea>
    <p>Content</p>
    <textarea id="text" name="content" rows="10"><?php echo($content); ?></textarea>
    <p></p>
    <input type="submit" name="submit" value="Send" />
</form>