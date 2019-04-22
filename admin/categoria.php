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
                    Categorias</h2>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM categoria";
                                $res = mysqli_query($link, $sql);

                                while($r = mysqli_fetch_assoc($res)){
                                    ?>

                                       <tr>
                                    <th scope="row"><?php echo $r['id']; ?></th>
                                    <td><?php echo $r['name']; ?></td>
                                    <td><a href="editcategoria.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="deletecategoria.php?id=<?php echo $r['id']; ?>">Delete</a></td>
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