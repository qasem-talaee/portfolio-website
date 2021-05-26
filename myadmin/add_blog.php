<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/image_upload.php');
include('includes/db.php');
$flag=0;
$title=$meta_desc=$url=$key=$content="";
if(isset($_POST['submit'])){
    $title=test_input($_POST['title']);
    $status=$_POST['status'];
    $show=$_POST['show'];
    $meta_desc=$_POST['meta_desc'];
    $key=$_POST['key'];
    $content=$_POST['content'];
    $content = str_replace('\'', '___', $content_en);
    #get image
    $img = image_upload('img', '../images/', 5000000);
    $insert="INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_img`, `blog_date`, `blog_content`, `blog_meta_desc`, `blog_keyword`, `blog_status`, `blog_show`) VALUES (NULL, '$title', '$img[1]', NOW(), '$content', '$meta_desc', '$key', '$status', '$show')";
    $run=mysqli_query($con,$insert);
    if($run){
        $flag = 2;
    }else{
        $flag = 1;
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h1><i>Add New Blog</i></h1>

<p>-- Add New</p>
<form method="post" enctype="multipart/form-data" action="?p=add_blog">
    <p>Title</p>
    <input type="text" name="title" value="<?php echo($title); ?>"/>
    <p>Image</p>
    <input type="file" name="img" />
    <p>Status</p>
    <select name="status">
        <option value='b'>Blog</option>
        <option value='p'>Work</option>
    </select>
    <p>Show</p>
    <select name="show">
        <option value="0">Don't Show</option>
        <option value="1">Show</option>
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