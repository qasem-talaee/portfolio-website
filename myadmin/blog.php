<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$get_num="select * from blog order by blog_id DESC";
$run_num=mysqli_query($con,$get_num);
$count_page=mysqli_num_rows($run_num);
$per_page=30;
if(!isset($_GET['page'])){
    $page=1;
}else{
    $page=$_GET['page'];
}
$start_page=($page-1)*$per_page;
$count_page=($count_page/$per_page)+1;
$get="select * from blog order by blog_id DESC limit $start_page,$per_page";
$run=mysqli_query($con,$get);
?>
<h1><i>Blog</i></h1>

<p>-- Add New</p>
<a href="?p=add_blog">Add New Work or Blog</a>

<p>-- List of All Blogs</p>
<div style="">
    <table border="1">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Show</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_array($run)){ 
                $id = $row['blog_id'];
                $img = $row['blog_img'];
                $title = $row['blog_title'];
                $status = $row['blog_status'];
                $show = $row['blog_show'];
                $date = $row['blog_date'];
                ?>
                <tr>
                    <td style="width: 10%"><img width="100%" height="auto" src="../images/<?php echo($img); ?>" /></td>
                    <td><a target="_blank" href="../detail.php?id=<?php echo($id); ?>"><?php echo($title); ?></a></td>
                    <td><?php if($status == 'p'){echo('Work');}if($status == 'b'){echo('Blog');} ?></td>
                    <td><?php if($show == 0){echo('Don\'t Show');}if($show == 1){echo('Show');} ?></td>
                    <td><?php echo($date); ?></td>
                    <td><a href="?p=blog_edit&id=<?php echo($id); ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="?p=blog_delete&id=<?php echo($id); ?>" class="btn btn-danger">Delete</a></td>
                </tr>
        <?php  } ?>
    </table>
</div>

<p>-- Pagination</p>
<ul>
    <?php
        for($i=1;$i<=$count_page;$i++){ ?>
            <li class=" <?php if($i == $page){echo('disabled');} ?>">
                <a  href="?p=blog&page=<?php echo($i); ?>"><?php echo($i); ?></a>
            </li>
    <?php } ?>
</ul>