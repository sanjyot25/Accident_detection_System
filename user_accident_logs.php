<?php 
	session_start();
	
	//auto refresh the page after every 5 seconds
	header("refresh: 5");
?>

<?php
  include 'config.php'; 
  $username = $_SESSION["username"];
  echo $username;
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
	.accidentTitle{
		margin-top: 80px;
	}

	.acidentTable{
		margin-top: 20px;
	}
	tr:nth-child(even) { 
            background-color: #E2BFBF; 
    }
</style>


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
				        <a class="nav-link" href="user_account_info.php">Account Info</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="add_relative.php">Add Relatives</a>
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


	<h2 class="accidentTitle"><center>Accident Logs</center></h2>
	<div class="table-responsive-md acidentTable" >
	  <table class="table">
	 

	   <tr style="background-color: red;">
	      <th>Name</th>
	      <th>Date</th>
	      <th> Time</th>
	      <!-- <th>Accident Id</th> -->
	     <!--  <th>Accident_latitude</th>
	      <TH>Accident_longitude</TH>-->
	      <th>Car Number PLate</th>
	      <th>Track Me</th>
	    </tr>

	   <?PHP 
	   $chessi_number_details = mysqli_query($conn,"SELECT name,chessi_number, car_number_plate FROM registered_user where username='$username' "); 
	   while($row=mysqli_fetch_array($chessi_number_details)){
		    $chessi_number = $row['chessi_number'];
		    $car_number_plate = $row['car_number_plate'];
		    $name = $row['name'];
		} 

	  $q = mysqli_query($conn,"SELECT * FROM accident where chessi_number='$chessi_number' order by accident_id desc"); 
	  while($row=mysqli_fetch_array($q)){
	 ?>
	    <tr>
	      <td><?php echo $name?></td>
	      <td><?php echo $row['date']?></td>
	      <td><?php echo $row['time']?></td>
	      <!-- <td><?php //echo $row['accident_id']; ?></td> -->
	      <!-- <td><?php //echo $row['accident_latitude']; ?></td>
	      <td><?php //echo $row['accident_longitude']; ?></td>-->
	      <td><?php echo $car_number_plate;?></td>
	      <td>
	        <a href="http://maps.google.com/maps?&z=15&mrt=yp&t=m&q=<?php echo $row['accident_latitude']; ?>+<?php echo $row['accident_longitude']; ?>" target="_black">Trace Accident</a>
	        </td>
	    </tr>
	  
	 
	<?PHP } 

	 ?>
	  </table>
	   
	</div>



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