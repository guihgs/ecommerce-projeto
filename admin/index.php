<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" name="form1" action="index.php" method="post">
      <input type="text" placeholder="Email" name="username" required />
      <input type="password" placeholder="password" name="pwd" required/>
      <button type="submit" name="submit1">Logar</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
  <?php
	if (isset($_POST['submit1'])) {
		$username = mysqli_real_escape_string($link, $_POST['username']);

		$password = md5(mysqli_real_escape_string($link, $_POST['pwd']));

		//echo "Testando";
		$count = 0;
		$res=mysqli_query($link, "SELECT * FROM admin_login WHERE username='$username' && password='$password'");

		$count=mysqli_num_rows($res);
		//echo $count;  
    if ($count==0)  
    {

    ?>
   <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalidos</strong> Usuario ou Senha.
    </div>

    <?php
    }
    else 
    {

       $_SESSION["admin"]=$_POST["username"]; 
        ?>

     <script type="text/javascript">
            
            window.location="demo.php";

     </script>   
        <?php
    }

} ?>
</div>
</body>
</html>