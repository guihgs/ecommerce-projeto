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


 if (isset($_POST) & !empty($_POST)) {
        
        $name = mysqli_real_escape_string($link, $_POST['categoryname']);
        $sql = "INSERT INTO categoria (name) VALUES ('$name')";
        $res = mysqli_query($link, $sql);
        if($res){
            ?>
            <script type="text/javascript">
                alert("Categoria Adicionada!");
            </script>
            <?php
        }else{
            echo "Falha ao adicionar a categoria!";
        }
    }


 ?>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Adicionar Categoria</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="Productname">Nome da Categoria</label>
                            <br>
                            <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Nome da Categoria">
                        </div>
                        <button type="submit" class="btn btn-default">Criar</button>
                    </form>
                </div>
            </div>       
<?php include "footer.php"; ?>