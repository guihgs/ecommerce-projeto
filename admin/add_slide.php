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
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Adicionar Slide</h2>
                <div class="block">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                    	<table border="1">
                    		<tr>
                    			<td>Nome do Slide</td>
                    			<td><input type="text" name="slide_name" required=""></td>
                    		</tr>
                    			<tr>
                    			<td>Imagem do Slide</td>
                    			<td> <input type="file" name="slide_image" required=""/></td>
                    		</tr>
                    		<tr>
                    		<td colspan="2" align="center"><input type="submit" name="submit1" value="Enviar"></td>
                    	</tr>
                    	</table>
                    </form>
<?php
if (isset($_POST['submit1'])) {
	
	$slide_name = $_POST['slide_name'];
        
    $slide_image = $_FILES['slide_image']['name'];
        
    $temp_name = $_FILES['slide_image']['tmp_name'];
        
    $view_slides = "SELECT * FROM slider";
        
    $view_run_slide = mysqli_query($link,$view_slides);

    $count = mysqli_num_rows($view_run_slide);
        
        if($count<4){

            move_uploaded_file($temp_name,"slides_images/$slide_image");
            
            $insert_slide = "INSERT INTO slider (slide_name,slide_image) VALUES ('$slide_name','$slide_image')";
            
            $run_slide = mysqli_query($link,$insert_slide);
            
            echo "<script>alert('Seu novo slide foi adicionado com sucesso!')</script>";
            
            echo "<script>window.location='slides.php';</script>";

        }else{
            
           echo "<script>alert('Você atingio o limite de slides!')</script>"; 
            
        }

}

?>        
                </div>
            </div>
        </div>        
<?php include "footer.php"; ?>