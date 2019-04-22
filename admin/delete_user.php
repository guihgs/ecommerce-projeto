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
        
        $delete_user_id = $_GET['id'];
        
        $delete_user = "DELETE FROM admin_login WHERE id='$delete_user_id'";
        
        $run_delete = mysqli_query($link,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('Um usuario foi excluido!')</script>";
            
            echo "<script>window.location='users.php';</script>";
            
        }
        
    }

?>