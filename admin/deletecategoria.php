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
 <?php
 include "config.php";

 if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
    $sql = "DELETE FROM categoria WHERE id='$id'";
    if(mysqli_query($link, $sql)){
        ?>
        <script type="text/javascript">
            window.location="categoria.php";
        </script>
        <?php
    }
 }else{
        header('location: categoria.php');
    }
?>