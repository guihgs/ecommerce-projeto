    <?php 
    session_start(); 
    if(!$_SESSION['admin']){
   header("location:index.php");
   die;
}
    ?>
<?php
 include "header.php";
include "menu.php";
 ?>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Product Sales</h2>
                <div class="block">
                    This is testing
                </div>
            </div>
        </div>
<?php include "footer.php"; ?>
