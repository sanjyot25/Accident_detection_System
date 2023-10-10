<?php session_start(); ?>
<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>
    
  </title>

   <!-- Required meta tags -->

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- user defined css file for styling -->
    <link rel="stylesheet" href="style-index.css">

    <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

  <!-- font awaesome links-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!-- bootstrap cdn css link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<style type="text/css">

body{
  background-color: #e6e6e6;
}

.divLoginFormCenter {
  width: 400px;
  height: 400px;
  background-color: transparent;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  display: table;
  box-shadow: 15px 15px 15px 15px white!important;
}

.divLoginFormCenter #loginButton{
  color: black;
  background-color: #E2BFBF;
}
.divLoginFormCenter a{
  text-decoration: none;
  float:  right;
  margin: 10px;
  color: black;
  font-size: 16px;
}
div.content {
  display: table-cell;
  vertical-align: middle;
}

</style>
<body>
  
  <div class="header fixed-top" >
      <div class="container">
        <nav class="navbar navbar-expand-md">
          <a class="navbar-brand" href="#">Emergency Service</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars" id="humbergertop" style="font-size:30px"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php" style="opacity: 1;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>    
               <li class="nav-item">
                <a class="nav-link" href="about_contact_us.php">Contact Us</a>
              </li>        
            </ul>
          </div>  
        </nav>
      </div>
     </div>

     <div class="divLoginFormCenter">
        <div class="content">
          <h3>Login</h3>
          <hr/>
        <form method="POST" action="#">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter Username">
          </div>
          <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password">
          </div>
          <center>
            <button id="loginButton" type="submit" name="user_login" class="btn btn-default">Login</button>
          </center>
          <hr />
          <a href="register.php">Signup</a>
          <a href="#">Reset Password</a>
        </form>
        </div>
      </div>

</body>

<!-- bootstrap cdn js links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>

<?php

  if (isset($_POST['user_login'])) {
    
    $username=$_POST['username'];
    $password =md5($_POST['password']);

    $stmt = $conn->prepare("SELECT username, password FROM registered_user  WHERE username=? AND  password=? ");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
         
            while($stmt->fetch()) //fetching the contents of the row
              {  
                   $_SESSION['username'] = $username;
                   $_SESSION['logged_in'] = 1;       
                   echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Login Successfull.')            
                           window.location.href='index.php'
                           </SCRIPT>");
                  exit();
               }
              
        }
    else {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Invaid username or password.')
            window.location.href='index.php'
          </SCRIPT>");
        }
        $stmt->close();
 
  }