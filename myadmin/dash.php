<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$get_blog = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 10";
$run_blog = mysqli_query($con, $get_blog);
?>
<h1><i>Dashboard</i></h1>
<p>-- Top 10 Blog</p>

<div style="">
    <table border="1">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Show</th>
            <th>Date</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_array($run_blog)){ 
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
                </tr>
        <?php  } ?>
    </table>
</div>

<p>-- Contacts Status</p>

<div style="">
    <table border="1">
        <tr>
            <th>All Messages</th>
            <th>Unanswered messages</th>
        </tr>
        <tr>
            <?php
                $get_all = "SELECT * FROM contact";
                $run_all = mysqli_query($con, $get_all);
                $count_all = mysqli_num_rows($run_all);
                $get_un = "SELECT * FROM contact WHERE con_status=0";
                $run_un = mysqli_query($con, $get_un);
                $count_un = mysqli_num_rows($run_un);
            ?>
            <td><?php echo ($count_all); ?></td>
            <td><?php echo ($count_un); ?></td>
        </tr>
    </table>
</div>