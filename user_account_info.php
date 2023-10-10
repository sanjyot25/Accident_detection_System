<?php 
  session_start();
?>

<?php
  include 'config.php'; 
  $username = $_SESSION["username"];
?>

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
<body style="background-color: #e6e6e6; ">
  <?php  if( $_SESSION['logged_in'] = 1 &&  $_SESSION['username'] = $username)
     {?>
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
                <a class="nav-link" href="user_accident_logs.php">Accident Logs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_relative.php">Add Relatives</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="" data-target="#update_password"> Update Password</a>
              </li> 
               <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>    
               <li class="nav-item">
                <a class="nav-link" href="about_contact_us.php">Contact Us</a>
              </li>        
            </ul>
          </div>  
        </nav>
      </div>
     </div>



     <!--==================================================== -->

      <?php 
  $user_details = mysqli_query($conn,"SELECT * FROM `registered_user` WHERE username = '$username'");

  while ($row = mysqli_fetch_array($user_details)) {
    $Mobile_number=$row['mob_number'];   
      $car_no_plate = $row['car_number_plate']; 
      $car_chessi_no = $row['chessi_number'];
        $name = $row['name']; 
?>

<div class="container" style="box-shadow: 15px 15px 15px 15px white!important; border-radius: 10px; margin-top: 100px;"> 

       <form method="POST" action="#"style="margin: 20px;">  
        <fieldset>
    <div class="text-center padding" style="margin: 20px; "><h2>Update Details</h2></div>  
   <div class="form-group row">  
                 
               <div class="form-row ">  
               <div class="form-group col-md-6">  
                   <label for="lastName" class="form-label col-lg-12">Username</label>  
                   <input type="text" class="form-control col-lg-12" name="username" placeholder="<?php echo $username ?>" disabled="disabled" value ="<?php echo $username ?>" placeholder="Username">  
               </div> 
                
               <div class="form-group col-md-6">  
                   <label for="lastName" class="form-label col-lg-12">Car Plate Number</label>  
                   <input type="text" class="form-control col-lg-12" disabled="disabled" name="car_number_plate" placeholder="<?php echo $car_no_plate ?>" value = "<?php echo $car_no_plate ?>">  
               </div>  
                <div class="form-group col-md-6">  
                   <label for="firstName" class="form-label col-lg-12">Name</label>  
                   <input type="text" class="form-control col-lg-12"  name="name" placeholder="<?php echo $name ?>"  value="<?php echo $name ?>">  
               </div>
  <div class="form-group col-md-6">  
                   <label for="email" class="form-label col-lg-12">Car Chessi Number</label>  
                   <input type="text" class="form-control col-lg-12" disabled="disabled" name="car_chessi_number" placeholder="<?php echo $car_chessi_no ?>" value="<?php echo $car_chessi_no ?>" >  
               </div>  
        <div class="form-group col-md-6">  
                   <label for="password" class="form-label col-lg-12">Mobile Number</label>  
                   <input type="number" class="form-control col-lg-12"  name="mobile_number" placeholder="<?php echo $Mobile_number ?>" value="<?php echo $Mobile_number ?>" >  
               </div>  
    
 <?php }?>           <div class="form-group col-lg-12">  
           <center> <button type="submit" class=" btn btn-default" name="change_userdata" style="background-color: #E2BFBF;color: black; margin-bottom: 10px;">Update Details?</button> 

         
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#update_relativeData" style="background-color: #E2BFBF;color: black; margin-bottom: 10px;">Update Relative Details</button> </center>


           

   </div> 
   </div> 
</div>
</fieldset>

</form>
</div>


 




<!-- modal for updating relatives details opens-->
<!-- Modal -->
<div class="modal fade"id="update_relativeData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content" style="background-color: #e6e6e6;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Update Relative Details </b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php 
      $relative_detail = mysqli_query($conn,"SELECT * FROM `relative_details` WHERE username = '$username'");
    $countRelative=0;
    while ($row = mysqli_fetch_array($relative_detail)) {
      $r_email=$row['R_email'];
      $countRelative = $countRelative+1;  
    }?> 
      <div class="modal-body">
          <form method="POST" action="#">
           <?php if($countRelative == 1 || $countRelative > 1) {?>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Relative Email:</label> 
               <input type="text" class="form-control" name="r_email" placeholder="<?php echo $r_email;?>" value="<?php echo $r_email;?>">
            </div>
          <?php }
          else{?>
          <div class="form-group">
              <h6>No Relatives Details has been added to your account</h6>
            </div>  
          <?php } ?>
      
        <!-- display the buttons if and only if relatives data exists -->
        <?php if($countRelative == 1 || $countRelative > 1) {?>
          <button type="submit" class="btn btn-default" style="background-color: red;color: black; "  name="delete">Delete?</button>
          <button type="submit"class="btn btn-default" style="background-color:#E2BFBF;color: black;"name="update_relativeData_modal">Update?</button>
          <?php }
        
          //allow user to add a relative if doesnot exists
          else{?>
          <center>
            <button type="submit" class="btn btn-default" style="background-color: #E2BFBF;color: black; " formaction="add_relative.php" >Add a Relatve?</button>
          </center>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal for updating relatives details closes -->








<!-- modal to update the password -->
<div class="modal fade" id="update_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #e6e6e6;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Relative Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
          <form method="POST" action="#">
          
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Enter Old Password</label> 
               <input type="password" class="form-control" name="old_password" placeholder="Enter Old Password">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Enter New Password</label> 
               <input type="password" class="form-control" name="new_password" placeholder="Enter new Password">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Confirm Password</label> 
               <input type="password" class="form-control" name="c_password" placeholder="Confirm Password">
            </div>
            <center>
          <button type="submit" class="btn btn-default" style="background-color: #E2BFBF;color: black; "  name="update_password">Update Password?</button> </center>
          
        </form>
      </div>
    </div>
  </div>
</div>








</body>
</html>


<!-- script for updating user Relative data -->
<?php 
  if (isset($_POST['update_relativeData_modal'])) {
    $r_email=$_POST['r_email'];
    echo $r_email; 

    $update = mysqli_query($conn,"UPDATE `relative_details` SET `R_email`='$r_email' WHERE username = '$username'");
    if ($update) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Hi $name, Your Relative Data has been Successfully updated :)')            
                           window.location.href='user_account_info.php'
                           </SCRIPT>");
            exit(); 
    }else
    {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Hi $name, Problem While Updating your relative data :(')            
                           window.location.href='add_relative.php'
                           </SCRIPT>");
            exit();
    }
  }
  else if (isset($_POST['delete'])) {
    $delete_relative = mysqli_query($conn,"DELETE FROM `relative_details` WHERE username='$username'");
    if ($delete_relative) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Hi $name, Your Relative Data has been Deleted Successfully :)')            
                           window.location.href='user_account_info.php'
                           </SCRIPT>");
            exit(); 
    }else
    {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Hi $name, Problem While Deleting your relative data :(')            
                           window.location.href='user_account_info.php'
                           </SCRIPT>");
            exit();
    }
  }
?>


<!-- script for updating the user personal account data -->
<?php 
  if (isset($_POST['change_userdata'])) {
     $Mobile_number=$_POST['mobile_number']; 
       $name = $_POST['name'];

       $update_userData = mysqli_query($conn,"UPDATE `registered_user` SET `name`='$name',`mob_number`='$Mobile_number' WHERE username = '$username' ");
       if ($update_userData) {
         echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Hi $name, Data Updated Successfully.')            
                           window.location.href='user_account_info.php'
                           </SCRIPT>");
               exit();
       }
       else{
         echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Hi $name, Problem while Updating Data. Try Again In some time')            
                           window.location.href='user_account_info.php'
                           </SCRIPT>");
               exit();
       }

  }

?>

<?php 
  if (isset($_POST['update_password'])) {
    $new_password=md5($_POST["new_password"]);
        $c_password=md5($_POST["c_password"]);
        $old_password=md5($_POST["old_password"]);

         
      $registered_userData = mysqli_query($conn,"SELECT * FROM `registered_user` WHERE username = '$username'");
    while ($row = mysqli_fetch_array($registered_userData)) {
      $Password=$row['Password']; 
      echo $Password;
    }
    echo "<br>";
    echo $old_password;

    if($Password == $old_password){
              if($new_password == $c_password){
                  $updatePassword = mysqli_query($conn,"UPDATE registered_user set password='$c_password' where username='$username' AND password='$Password' ");
                  if($updatePassword){
                           echo ("<SCRIPT LANGUAGE='JavaScript'>
                                 window.alert('Your Password has been changed.')
                                window.location.href='user_account_info.php'
                              </SCRIPT>");
                        }
                    }
        else{
               echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('Confirm Password Correctly.')
                     window.location.href='user_account_info.php'
                      </SCRIPT>");
            }
        }
        else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Check your current password .')
                  window.location.href='user_account_info.php'
                  </SCRIPT>");
            }  

  }
?>


     <!-- ==================================================== -->




<?php } 
else{?>
         <SCRIPT LANGUAGE='JavaScript'>
                                        window.alert('login to acces the this page :)')
                                        window.location.href='index.php'
         </SCRIPT> 
<?php }?>
</body>

<!-- bootstrap cdn js links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
