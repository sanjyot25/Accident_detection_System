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
                <a class="nav-link" href="login.php">Login</a>
              </li>    
               <li class="nav-item">
                <a class="nav-link" href="about_contact_us.php">Contact Us</a>
              </li>        
            </ul>
          </div>  
        </nav>
      </div>
    </div>


     <div class="container" style="box-shadow: 15px 15px 15px 15px white!important; border-radius: 10px; margin-top: 100px;"> 
           <form method="POST" action="#"style="margin: 20px;">  
            <fieldset>
            <div class="text-center padding" style="margin: 20px; "><h2>Register</h2></div>  
            <div class="form-group row">     
                   <div class="form-row ">  
                     <div class="form-group col-md-6">  
                         <label for="lastName" class="form-label col-lg-12">Name</label>  
                         <input type="text" class="form-control col-lg-12" name="name" placeholder="Enter Name">  
                     </div> 
                      
                     <div class="form-group col-md-6">  
                         <label for="lastName" class="form-label col-lg-12">Username</label>  
                         <input type="text" class="form-control col-lg-12"  name="username" placeholder="Enter Username">  
                     </div>  
                      <div class="form-group col-md-6">  
                         <label for="firstName" class="form-label col-lg-12">Car Number Plate</label>  
                         <input type="text" class="form-control col-lg-12"  name="car_no_plate" placeholder="Enter Car Number" >  
                     </div>
                <div class="form-group col-md-6">  
                         <label for="email" class="form-label col-lg-12">Car Chessi Number</label>  
                         <input type="text" class="form-control col-lg-12"  name="car_chessi_no" placeholder="Enter Car Chessi Number" >  
                     </div>  
                <div class="form-group col-md-6">  
                        <label for="Mobile_number" class="form-label col-lg-12"> Mobile Number</label>  
                        <input type="number"class="form-control col-lg-12" name="Mobile_number" placeholder="Enter Mobile Number">
                     </div>
                     <div class="form-group col-md-6">
                 <label for="password" class="form-label col-lg-12">Password</label>  
                        <input type="password" class="form-control col-lg-12" name="password" placeholder="Enter Password">
              </div>

              <div class="form-group col-md-6">
                  <label for="password" class="form-label col-lg-12">Confirm Password</label>  
                          <input type="password" class="form-control col-lg-12" name="c_password" placeholder="Confirm Password">
              </div>

                <div class="form-group col-lg-12">  
                     <center>
                      <button type="submit" name="submit" class="btn btn-default" style=" background-color: #E2BFBF; color: black;  font-size: 20px;">Submit </button>
                     </center>
                </div>

              </div> 
          </div>
        </fieldset>
      </form>
    </div>

</body>

<!-- bootstrap cdn js links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>







<?php
    if(isset($_POST['submit'])){
     $Mobile_number=$_POST['Mobile_number']; 
     $password =md5($_POST['password']); 
     $c_password = md5($_POST['c_password']); 
     $username = $_POST['username']; 
     $car_no_plate = $_POST['car_no_plate']; 
     $car_chessi_no = $_POST['car_chessi_no'];
     $name = $_POST['name']; 



      if($password === $c_password){
        $register_user = mysqli_query($conn,"INSERT INTO registered_user(Mob_number,password,username,car_number_plate,chessi_number,name) values('$Mobile_number','$password','$username','$car_no_plate','$car_chessi_no','$name')");
        if ($register_user) {
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = 1; 
               echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Registration Successfull.')            
                           window.location.href='index.php'
                           </SCRIPT>");
                  exit();                                
          
        }else{ echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Registration UnSuccessfull. Try to use Another username
                           ')            
                           window.location.href='register.php'
                           </SCRIPT>");
                  exit();
                }

      }else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('password didnt match')            
                           window.location.href='register.php'
                           </SCRIPT>");
                  exit();
      }
   
    }

  ?>