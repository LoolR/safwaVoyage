<?php
require_once 'module/connection.php';
require_once 'module/model/User/User.php';

$model = new User();
$User = $model->getUser();

   ob_start();
   session_start();
?>

<html lang = "en">
   
   <head>
      <title>Tutorialspoint.com</title>
        <link href = "../css/bootstrap.min.css" rel = "stylesheet">
        <link rel="stylesheet" href="../css/login_style.css"/>
      
   </head>
	
   <body>
      
      <h2>Bonjour, Identifiez vous s'il vous plait </h2> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				  while($data=$User->fetch()){
				      if($data["login"]==$_POST['username']){
				         if($data["password"]==md5($_POST['password'])){
                        $_SESSION['username'] = $data["login"];
                        header("Location: admin/index.php");
                        exit();
				         }
				      }
				  }
                  $msg = 'erreur username et password';
            }
         ?>
         
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         <a href='logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> reinitialiser la session</a>
         
      </div> 
      
   </body>
</html>