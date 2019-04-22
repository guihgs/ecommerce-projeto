 <?php 
    session_start(); 
    if(!$_SESSION['admin']){
   header("location:index.php");
   die;
}

include "config.php";

?>

<?php 

    if(isset($_GET['id'])){
        
        $delete_slide_id = $_GET['id'];
        
        $delete_slide = "DELETE FROM slider WHERE slide_id='$delete_slide_id'";
        
        $run_delete = mysqli_query($link,$delete_slide);
        
        if($run_delete){
            
            echo "<script>alert('Um de seus Slides foi deletado!')</script>";
            
            echo "<script>window.location='slides.php';</script>";
            
        }
        
    }

?>