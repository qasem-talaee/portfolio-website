<?php
if(!isset($_SESSION['name'])){
    header('Location: login.php');
}
include('includes/db.php');
$get_num="select * from contact";
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
$get="select * from contact order by con_id DESC limit $start_page,$per_page";
$run=mysqli_query($con,$get);
?>
<h1><i>Contact</i></h1>


<p>-- List of All Contacts</p>
<div style="">
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>Show More</th>
            <th>Delete</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_array($run)){ 
                $id = $row['con_id'];
                $name = $row['con_name'];
                $status = $row['con_status'];
                $email = $row['con_email'];
                $date = $row['con_date'];
                ?>
                <tr>
                    <td><?php echo ($name); ?></td>
                    <td><?php echo ($email); ?></td>
                    <td style="font-size:1.5em;"><?php if($status == 0){echo('&#9746;');}if($status == 1){echo('&#9745;');} ?></td>
                    <td><?php echo ($date); ?></td>
                    <td><a href="?p=con_show&id=<?php echo($id); ?>" class="btn btn-primary">Show</a></td>
                    <td><a href="?p=con_del&id=<?php echo($id); ?>" class="btn btn-danger">Delete</a></td>
                </tr>
        <?php  } ?>
    </table>
</div>

<p>-- Pagination</p>
<ul>
    <?php
        for($i=1;$i<=$count_page;$i++){ ?>
            <li class=" <?php if($i == $page){echo('disabled');} ?>">
                <a  href="?p=contact&page=<?php echo($i); ?>"><?php echo($i); ?></a>
            </li>
    <?php } ?>
</ul>