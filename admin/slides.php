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
                    Slides</h2>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Slide</th>
                                    <th>Imagem do Slide</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                
                             $get_slides = "SELECT * FROM slider";
        
                             $run_slides = mysqli_query($link,$get_slides);
        
                             while($row_slides=mysqli_fetch_array($run_slides)){
                        
                             $slide_id = $row_slides['slide_id'];
                        
                             $slide_name = $row_slides['slide_name'];
                        
                             $slide_image = $row_slides['slide_image'];
                
                            ?>
                                       <tr>
                                    <th scope="row"><?php echo $slide_id; ?></th>
                                    <td><?php echo $slide_name; ?></td>
                                    <td><img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_name; ?>" width='250' height='100'></td>
                                     <td><a href="edit_slide.php?id=<?php echo $slide_id; ?>">Editar</a> | <a href="delete_slide.php?id=<?php echo $slide_id; ?>">Deletar</a></td>
                                </tr>

                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
<?php include "footer.php"; ?>