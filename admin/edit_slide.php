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
 ?>
<?php 

    if(isset($_GET['id'])){
        
        $edit_slide_id = $_GET['id'];
        
        $edit_slide = "SELECT * FROM slider WHERE slide_id='$edit_slide_id'";
        
        $run_edit_slide = mysqli_query($link,$edit_slide);
        
        $row_edit_slide = mysqli_fetch_array($run_edit_slide);
        
        $slide_id = $row_edit_slide['slide_id'];
        
        $slide_name = $row_edit_slide['slide_name'];
        
        $slide_image = $row_edit_slide['slide_image'];
        
    }

?>


        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Editar Slide</h2>
                <div class="block">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                    	<table border="1">
                    		<tr>
                    			<td>Nome do Slide</td>
                    			<td><input type="text" name="slide_name" required="" value="<?php echo $slide_name; ?>"></td>
                    		</tr>
                    			<tr>
                    			<td>Imagem do Slide</td>
                    			<td> <input type="file" name="slide_image" required=""/>
                                    <br/>
                            
                            <img src="slides_images/<?php echo $slide_image; ?>" width="250" height="100">
                                </td>
                    		</tr>
                    		<tr>
                    		<td colspan="2" align="center"><input type="submit" name="submit1" value="Editar"></td>
                    	</tr>
                    	</table>
                    </form>
<?php  

    if(isset($_POST['submit1'])){
        
        $slide_name = $_POST['slide_name'];
        
        $slide_image = $_FILES['slide_image']['name'];
        
        $temp_name = $_FILES['slide_image']['tmp_name'];
        
        move_uploaded_file($temp_name,"slides_images/$slide_image");
        
        $update_slide = "UPDATE slider SET slide_name='$slide_name',slide_image='$slide_image' WHERE slide_id='$slide_id'";
        
        $run_update_slide = mysqli_query($link,$update_slide);
        
        if($run_update_slide){
            
            echo "<script>alert('Seu Slide foi atualizado com sucesso!')</script>"; 
        
            echo "<script>window.location='slides.php';</script>";
            
        }
        
    }

?>
                </div>
            </div>
        </div>        
<?php include "footer.php"; ?>