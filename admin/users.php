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
                    Usuarios</h2>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Senha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM admin_login";
                                $res = mysqli_query($link, $sql);

                                while($r = mysqli_fetch_assoc($res)){
                                    ?>

                                       <tr>
                                    <th scope="row"><?php echo $r['id']; ?></th>
                                    <td><?php echo $r['username']; ?></td>
                                    <td><?php echo $r['password']; ?></td>
                                    <td><a href="edit_user.php?id=<?php echo $r['id']; ?>">Editar</a> | <a href="delete_user.php?id=<?php echo $r['id']; ?>">Deletar</a></td>
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