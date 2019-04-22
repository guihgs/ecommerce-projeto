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
        header('location: categoria.php');
    }

 if (isset($_POST) & !empty($_POST)) {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $name = mysqli_real_escape_string($link, $_POST['categoryname']);
        $sql = "UPDATE categoria SET name= '$name' WHERE id=$id";
        $res = mysqli_query($link, $sql);
        if($res){
            ?>
            <script type="text/javascript">
                alert("Categoria Atualizada!");
            </script>
            <?php
        }else{
            echo "Falha ao atualizar a categoria!";
        }
    }


 ?>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Editar Categoria</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="Productname">Nome da Categoria</label>
                            <br>
                            <?php
                            $sql = "SELECT * FROM categoria WHERE id=$id";
                            $res = mysqli_query($link, $sql);
                            $r=mysqli_fetch_assoc($res);
                            ?>
                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                            <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="<?php echo $r['name']; ?>">
                        </div>
                        <button type="submit" class="btn btn-default">Editar</button>
                    </form>
                </div>
            </div>       
<?php include "footer.php"; ?>