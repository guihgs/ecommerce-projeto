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
 }else{
        header('location: users.php');
    }

 if (isset($_POST) & !empty($_POST)) {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = md5(mysqli_real_escape_string($link, $_POST['password']));
        $sql = "UPDATE admin_login SET username='$username', password='$password' WHERE id=$id";
        $res = mysqli_query($link, $sql);
        if($res){
            ?>
            <script type="text/javascript">
                alert("Usuario Editado com sucesso!");
            </script>
            <?php
        }else{
            echo "Falha ao atualizar o usuario!";
        }
    }


 ?>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Edite um Usuario</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="Productname">Usuarios</label>
                            <br>
                            <?php
                            $sql = "SELECT * FROM admin_login WHERE id=$id";
                            $res = mysqli_query($link, $sql);
                            $r=mysqli_fetch_assoc($res);
                            ?>
                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                            <input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $r['username']; ?>">
                            <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $r['password']; ?>">
                        </div>
                        <button type="submit" class="btn btn-default">Editar</button>
                    </form>
                </div>
            </div>       
<?php include "footer.php"; ?>