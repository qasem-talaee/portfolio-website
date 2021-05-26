<?php
$now = date('Y');
$dev_time = 2020;
if($now == $dev_time){ ?>
    <!-- footer row -->
    <div class="footer">
        <p>Developed with <span class="heart">&#10084;</span> by Qasem Talaee <?php echo($now); ?></p>
    </div>
    <!-- footer row -->
<?php
}else{ ?>
    <!-- footer row -->
    <div class="footer">
        <p>Developed with <span class="heart">&#10084;</span> by Qasem Talaee 2020-<?php echo($now); ?></p>
    </div>
    <!-- footer row -->
<?php
}
?>