<?php 
	 include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- user defined css file for styling -->
   	<link rel="stylesheet" href="css/style-index.css">

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
		background-color: #f2f2f2;
	}
	
	.header{
	    background-color: #E2BFBF;
	    padding: 0px;
    }
    .header .navbar .navbar-brand{
    	font-family: 'Montserrat', sans-serif;
    	color: #000000;
    	font-size: 20px;
    	font-weight: 700;
    	text-transform: uppercase;
        }
    .header .navbar #collapsibleNavbar .nav-item .nav-link{
    	font-family: 'Montserrat', sans-serif;
    	color: #000000;
    	font-size: 15px;
    	font-weight: 500;
    	opacity: .8;
    }
	.divAmbulanceStatus #SearchButton{
		background-color: #E2BFBF;
	}
	.divAmbulanceStatus{
		background-color: white;
		border-radius: 20px;
		margin-bottom: 50px;
		padding-left: 5px;
		padding-right: 5px;
		margin-top: 120px;
	}
	.divAmbulanceStatus input{
		text-align: center;
	}
</style>
<body >

<!-- =========================  header section ==========================  -->
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
				        <a class="nav-link" href="about_contact_us.php">Contact Us</a>
				      </li>     			              
				    </ul>
				  </div>  
				</nav>
			</div>
		 </div>
<!-- =========================  header section ends ======================= -->
	
	<div class="container">
	<div class="divAmbulanceStatus">
        <div class="content"><br><br>
        <center> <h4>Ambulance Status Update</h4>
			<form method="POST" action="#">
		          <div class="form-group">
		            <label for="A_Plate_No">Enter Plate Number</label>
		            <input type="text" class="form-control" id="A_Plate_No" name="plate_No" placeholder="Enter plate Number">
		          </div>
		          <center>
		            <button id="SearchButton" type="submit" name="car_no_plate" class="btn btn-default">Search</button>
		          </center>
		    </form>
		   </center><br><br>
		</div>
	</div>
	</div>
	
	<?php 
		if (isset($_POST['car_no_plate'])) {
			
			$plate_No = $_POST['plate_No'];

			$list_ambulanceDetails = mysqli_query($conn,"SELECT * FROM `ambulance_details` WHERE a_plateNo = '$plate_No'");
			
			?>

			<div class="table-responsive-md acidentTable" >
			  <table class="table">

			   <tr style="background-color: red;">
			      <th>Ambulance Number plate</th>
			      <th>Free / Busy</th>   <!-- remove for original implementation. it is optional -->
			      
			    </tr>

			<?php
			while ($row=mysqli_fetch_array($list_ambulanceDetails)) { ?>
				<tr>
					<form method="POST" action="#">
						<td><?php echo $row['a_plateNo'];?></td>
						<td>
							<input type="hidden" name="c_plate_Number" value="<?php echo $row['a_plateNo'];?>">
						<?php 
							if ($row['ambulance_Status'] == 0) { ?>
								<button type="submit" name="amb_status" class="btn btn-success">Make Free</button>
							<?php }else{?>
								<button type="submit" name="amb_status" class="btn btn-secondary" disabled="disabled">You are Availabe</button>
							<?php }
						?>
						</td>
					</form>
				</tr>		 
		<?php	}	
		?></table>
		</div>		
	<?php }
	?>

	<!-- updtae the ambulance status when updated by the ambulance driver -->
	<?php
		if (isset($_POST['amb_status'])) {
			$carPLate = $_POST['c_plate_Number'];
			$update_ambulance_status = mysqli_query($conn,"UPDATE `ambulance_details` SET ambulance_Status ='1' WHERE a_plateNo = '$carPLate'");

			if ($update_ambulance_status) { // if updates successfully then do this
				echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Congrats.. You are now available.')            
                           window.location.href='ambulanceStatusUpdate.php'
                           </SCRIPT>");
                  exit();
			}else{ //couldnot update the details
				echo ("<SCRIPT LANGUAGE='JavaScript'>
                           window.alert('Sorry.. Cant update the data..')            
                           window.location.href='ambulanceStatusUpdate.php'
                           </SCRIPT>");
                  exit();
			}
		}
	?>

</body>

<!-- bootstrap cdn js links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>