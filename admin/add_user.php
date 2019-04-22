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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 
<title>Registro</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>  
<body>  
<div id="main">
<?php
if(!empty($_POST['username']) && !empty($_POST['pwd']))
{
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = md5(mysqli_real_escape_string($link, $_POST['pwd']));
     
    $checkusername = mysqli_query($link, "SELECT * FROM admin_login WHERE username = '".$username."'");
      
     if(mysqli_num_rows($checkusername) == 1)
     {
        echo "<h1>Erro</h1>";
        echo "<p>Desculpe, Este usuario já está em uso por favor escolha outro nome</p>";
     }
     else
     {
        $registerquery = mysqli_query($link, "INSERT INTO admin_login (username, password) VALUES('".$username."', '".$password."')");
        if($registerquery)
        {
            echo "<script>alert('Novo Usuario criado com sucesso!');</script>";
            
            echo "<script>window.location='users.php';</script>";


            ?>
            <script>
                setTimeout("location.href = 'index.php';",1500);
            </script>

        <?php
        }
        else
        {
            echo "<h1>Erro</h1>";
            echo "<p>Desculpe mas o registro falhou reveja o que colocou de errado!</p>";    
        }       
     }
}
else
{
    ?>
     
     <div class="grid_10">
            <div class="box round first">
                <h2>
                   Adicionar Usuario</h2>
                     <form method="post" action="" name="registerform" id="registerform">
                        <div class="form-group">
                            <label for="username">Username:</label><input type="text" name="username" id="username" required="" /><br />
                            <label for="password">Password:</label><input type="password" name="pwd" id="password" required="" /><br />
                        </div>
                        <button type="submit" name="register" id="register" class="btn btn-default">Criar</button>
                    </form>
                </div>
            </div>       
     
    <?php
}
?>
<?php include "footer.php"; ?>