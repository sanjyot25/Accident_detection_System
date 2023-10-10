<?php 
session_start();
?>

<?php
  include 'config.php'; 
  //echo $_SESSION["username"];
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

<style type="text/css">
.relativeData h2{
	padding-top: 30px;
	text-align: center;
}
.relativeData input{
	width: 99%;
	text-align: center;
}
.relativeData{
	box-shadow: 2px 2px 5px 5px white!important; border-radius: 10px; margin-top: 100px;
}	
</style>

<body>
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
				        <a class="nav-link" href="user_account_info.php">Account Info</a>
				      </li>
				       <li class="nav-item">
				        <a class="nav-link" href="about_contact_us.php">Contact Us</a>
				      </li> 
				       <li class="nav-item">
				        <a class="nav-link" href="logout.php">Logout</a>
				      </li>    
				              
				    </ul>
				  </div>  
				
				</nav>
			
			</div>
		 </div>


		 <div class="container relativeData" style=""> 
       		<form method="POST" action="#">  
       			<h2>Add Relative Deatils</h2>
       			<p><center><b>Maximum ONE Relative Details can be added</b></center></p>
       			<center>
       				<div class="form-group">
            			<input style="font-size: 20px; color: black;" type="email" name="r_email" class="form-control"   placeholder="Enter Relatives Email">    
          			</div>
          			 <button type="submit" name="add_relative_details" class="btn btn-default" style=" background-color: #E2BFBF; color: black;">Submit</button>
       			</center> <br>
			</form>
		</div>


</body>


	<!-- ================= script to add relaltives deatials to in the database ==================== -->
	<?php 
    if (isset($_POST['add_relative_details'])) {
	       $r_email = $_POST['r_email'];
	       $keep_count=0;
	    $check_already_exists = mysqli_query($conn,"SELECT * FROM `relative_details` WHERE username = '$username'");

	    while ($row=mysqli_fetch_array($check_already_exists)) {
	      $keep_count = $keep_count+1;
	    }

	    if ($keep_count == 1 || $keep_count >1) {
	      echo ("<SCRIPT LANGUAGE='JavaScript'>
	                           window.alert('Relative Details has already been added to your account.')            
	                           window.location.href='user_account_info.php'
	                           </SCRIPT>");
	         exit();
	    }
	    else{
	    $add_relative_details = mysqli_query($conn,"INSERT INTO `relative_details`(`username`, `R_email`) VALUES ('$username','$r_email')");
	    if ($add_relative_details) {
	       echo ("<SCRIPT LANGUAGE='JavaScript'>
	                           window.alert('Relative Details has been Successfull Added to your account.')            
	                           window.location.href='user_account_info.php'
	                           </SCRIPT>");
	         exit();
	      }else{
	        echo ("<SCRIPT LANGUAGE='JavaScript'>
	                           window.alert('Relative Details has already been added to your account OR There was some problem while adding relatives details to your account.')            
	                           window.location.href='add_relative.php'
	                           </SCRIPT>");
	         exit();
	      }

	    }
    }

	?>


<?php } 
else{?>
        <SCRIPT LANGUAGE='JavaScript'>
                                        window.alert('login to acces the this page :)')
                                        window.location.href='login.php'
         </SCRIPT>
<?php }?>
<!-- bootstrap cdn js links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>