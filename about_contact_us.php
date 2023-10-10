<?php session_start(); ?>
<?php $username =  $_SESSION["username"];?>
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
	background-color: #f2f2f2;
}

hr{
	background-color: #E2BFBF;
}
.about-us-conatct-us{
	margin-top: 70px;
}
.about-contact-us-card {
  float: left;
  width: 50%;
  padding: 0 10px;
}

.actual-about-contact-us-card {
 background-color:#f2f2f2;
 box-shadow: 5px 2px 5px 5px white!important;
 border-radius: 10px;
 padding: 16px;
 text-align: justify-all;
   
}
.actual-about-contact-us-card #aboutText{
	 color: #000000;
}

.actual-about-contact-us-card #ContactText{
	 color: #000000;
}
.about-us-conatct-us #upperText{
	font-size: 30px; 
	text-align: center; 
	padding-top: 20px; 
	padding-bottom: 10px;
}

.actual-about-contact-us-card span{
	color: #000000;
}

.actual-about-contact-us-card  #bottomText{
	color: #000000;
	text-align: right;
}
/* Responsive about-contact-us-cards */
@media screen and (max-width: 1000px) {
  .about-contact-us-card {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
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
				    </ul>
				  </div>  
				</nav>
			</div>
    </div>

 

	<div class="container about-us-conatct-us" id="about-us-conatct-us">
		 <p id="upperText" style="">This is What we are</p>
		 <div class="row">
		 	<div class="about-contact-us-card">
			    <div class="actual-about-contact-us-card">
			     <center> <h3>About Us</h3></center><hr>
			      <p><b>Sanjyot Velip | Kanaiya Desai | Baban Ghadi | Arun Ganachari</b>,</p>
			      <p id="aboutText" >We are final year students of GEC doing our final year project to solve some seroius real world problems faced by many individual then and also now due to lack of emergency services like 108 ambulance emergency service and 100 police emergency services whenever an accident happens.</p>
			      <p id="aboutText">If you have any problem in accessing our services or you want to give any suggestions fell free to give us your feedback in the from the contact us section. We will take the necessary actions within 24 hours.</p><hr>
			      <p id="bottomText"> Best Regards</p>
			      <p id="bottomText">Team <b>  Batch E </b></p>
			    </div>
			  </div>

			  <div class="about-contact-us-card">
			    <div class="actual-about-contact-us-card">
			     <center> <h3>Contact Us</h3></center><hr>
			      <p><b>We from Batch E Would Like to tell you that,</b></p>
			      <p id="ContactText" >Below are the contact details through which you can contact us to send us all your doubts and suggestions so that we can take we can improve the efficiency of our services. Your Feedback will be highly appreciated</p>
			      <p> <b>Email</b> :<span>feedback@batche.com</span></p>
			      <p><b>Mobile No:</b> <span >786958745</span> </p>
			      <p><b>Tel No </b>:<span > 0987-4657678 </span> </p><hr>
			      <p id="bottomText"> Best Regards</p>
			      <p id="bottomText">Team <b> Batch E </b></p>

			    </div>
			  </div>
		 </div>
	</div>
</body>
<!-- bootstrap cdn js links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>