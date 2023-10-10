<?php 
session_start();
?>

<?php  $username = $_SESSION['username']; 
?>
<!-- email functionality will be given in the webhost itself -->

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>

	 <!-- Required meta tags -->

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

   	<link rel="stylesheet" href="style-index.css">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<style>
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #E2BFBF;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }
    
    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 16px;
      color: black;
      display: block;
      transition: 0.3s;
    }
    
    .sidenav a:hover {
      color: #f1f1f1;
    }
    
    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
        margin-top:50px;
      margin-left: 50px;
    }
    
    #userNav {
      transition: margin-left .5s;
      padding: 0px;
    }
    
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
</style>
    
<body style="background-color: #f2f2f2;">
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
			        <a class="nav-link" href="#home" style="opacity: 1;">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="about_contact_us.php">About Us</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#ourService">Services</a>
			      </li>
			       <li class="nav-item">
			        <a class="nav-link" href="#getProductAndService">Get Services</a>
			      </li> 
			       <li class="nav-item">
			        <a class="nav-link" href="about_contact_us.php">Contact</a>
			      </li>    
			      <!--if user is logged in show him ths navigation also to access his details.-->
			      <?php  if( $_SESSION['logged_in'] = 1 &&  $_SESSION['username'] = $username){?>  
        			        <div id="mySidenav" class="sidenav">
                              <a href="javascript:void(0)" class="closebtn" style="color:red"  onclick="closeNav()">&times;</a>
                              <a  href="user_accident_logs.php">Accident Logs</a>
                              <a href="add_relative.php">Add Relatives</a>
                              <a href="user_account_info.php">Account Info</a>
                              <a  href="logout.php">Logout</a>
                            </div>
                             <div id="userNav">
                             <li class="nav-item">
    			                <a class="nav-link">
                                   <span style="font-size:30px;cursor:pointer; border-color: white;border-style:solid;border-radius:50%; background-color: #E2BFBF;padding:5px;" onclick="openNav()">U</span>
                                </a>
    			            </li>
    			            </div>
    			     <?php }
    			     else{?> 
    			        <li class="nav-item">
    			        <a class="nav-link" href="register.php">Register</a>
    			      </li>   
    			       <li class="nav-item">
    			        <a class="nav-link" href="login.php">Login</a>
    			      </li>
    			     <?php }?> 
			    </ul>
			  </div>  
			</nav>
		</div>
	 </div>
    <!--========================================================================================================-->
    
    

    <!--=============================================================================================================-->
	 <div class="sectionOne" id="home">
		 <div class="container">
		  <div class="row">
			    <div class="col-sm-12 col-md-7 col-lg-6 " style="border-style:; border-color: " >
			     	<center>
				     	<div class="sectionOneTitle">
				     		<h2 style="padding: 50px;">GET INSTANT 108 AND 100 EMERGENCY SERVICES AT GO</h2>
				     	</div>
			    	</center>
			    </div>

			    <div class="col-sm-12 col-md-5 col-lg-6 " style="border-style:slid;  border-color: " >
			    	<center>
			    		<div class="sectionOneimageCardSlider" >
			 				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
						  		<div class="carousel-inner">
						    		<div class="carousel-item active">
						        		<img src="ambulance.jpg" class="d-block w-100" alt="...">
						    		</div>
								    <div class="carousel-item">
								      <img src="police.png" class="d-block w-100" alt="...">
								    </div>
								    <div class="carousel-item">
								      <img src="relative.png" class="d-block w-100" alt="...">
								    </div>
						  		</div>
							</div> 
			 			</div>
			 		</center>
			    </div>
			    
		  </div>
		</div>
	 </div>


<!-- <hr style="background-color: yellow;"> -->


	 <div class="sectionSecond" id="getProductAndService">
		 <div class="container">
		   <div class="row">
			    <div class="col-sm-12 col-md-6 col-lg-6" style=" border-style:;  border-color:;">
			     <div class="imageCircle">
			     	<center><img src="model.jpg"></center>
			     </div>
			     <div class="imgDataButton">
			     	<form method="post">    
			     	    <button formaction="about_contact_us.php" class="btn">Explore Product</button>
			        </form>
			     </div>
			    </div>

			    <div class="col-sm-12 col-md-6 col-lg-6" style=" border-style:;  border-color: ">
			    	<div class="heading">
			      		<p>INSERT OUR PRODUCT INTO YOUR VEHICLE AND YOU ARE ALMOST READY TO GO</p>
			    	</div>
			    	<div class="subHeading">
			    		<p>You are just TWO step away from availing our services. Just visit to one of our service center and they will do the rest. Its that simple .</p>
			    		<form method="post">
			    		 <button formaction="about_contact_us.php" class="btn">Contact Us</button>
			    		</form>
			    	</div>
			    </div>
		   </div>
		</div>
	</div>
	




	 <div class="SectionThird" id="productRegistration">
	 	<div class="container">
	 		<div class="row">
			    <div class="col-sm-12 col-md-6 col-lg-6" style="border-style:;  border-color:; margin-bottom: 20px;">
			     	<div class="SectionThirdHeading">
	 					<p>REGISTER TO OUR WEBSITE AND YOU ARE ALL PERFECTLY READY TO GO</p>
	 				</div>
	 				<div class="SectionThirdSubHeading">
	 					<p>Just go and grab our product, U will never regret :)</p>
	 					<form method="POST">    
	 					    <button formaction="about_contact_us.php" class="btn">Contact Us</button>
	 				    </form>
	 				</div>
			    </div>

			    <div class="col-sm-12 col-md-5 col-lg-6 " style="border-style:slid;  border-color: ;" >
            	
            	<center>
	              <div class="sectionThirdImageCardSlider" >
	              	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	                  <div class="carousel-inner">
	                    <div class="carousel-item active">
	                        <img src="mobile.png" class="d-block w-100" alt="...">
	                    </div>
	                    <div class="carousel-item">
	                      <img src="mobile1.png" class="d-block w-100" alt="...">
	                    </div> 
	                  </div>
	             	 </div> 
	            	</div>
          		</center>
          		
          		</div>
			</div>
		</div>
	</div>


	<div class="sectionFourth" id="stats">
		<div class="container">
			<center><h1  style="margin-top: 50px;">WITH OUR PRODUCT</h1></center>
			<div class="row"> 
	            <div class="col-lg-6 mb-4"> 
	                <div class="card"> 
	                    
	  
	                    <div class="card-body"> 
	                        <h5 class="card-title">ACCIDENTS</h5> 
	                        <hr style="background-color: yellow;">
	                        <p class="card-text"> 
	                            151K (2019) 
	                        </p>
	                         <a href="https://www.statista.com/topics/5982/road-accidents-in-india/" >You can Check Here</a>  
	                    </div> 
	                </div> 
	            </div> 
	            <div class="col-lg-6 mb-4"> 
	                <div class="card"> 
	                    <img class="card-img-top" src="" alt=""> 
	  
	                    <div class="card-body"> 
	                        <h5 class="card-title">LIVES SAVED (Prediction)</h5> 
	                        <hr style="background-color: yellow;">
	                        <p class="card-text"> 
	                        	135K
	                        </p>
	                        <a href="https://www.statista.com/topics/5982/road-accidents-in-india/" >You can Check Here</a> 
	                    </div> 
	                </div> 
	            </div> 
	        </div>
	        <!-- <hr style="background-color: white;"> -->
	        <center><h1>WITHOUT OUR PRODUCT</h1></center>
	        <div class="row"> 
	            <div class="col-lg-6 mb-4"> 
	                <div class="card"> 
	                    
	  
	                    <div class="card-body"> 
	                        <h5 class="card-title">ACCIDENTS</h5> 
	                        <hr style="background-color: yellow;">
	                        <p class="card-text"> 
	                            151K (2019) 
	                        </p>
	                         <a href="https://www.statista.com/topics/5982/road-accidents-in-india/" >You can Check Here</a>  
	                    </div> 
	                </div> 
	            </div> 
	            <div class="col-lg-6 mb-4"> 
	                <div class="card"> 
	                     
	  
	                    <div class="card-body"> 
	                        <h5 class="card-title">LIVES SAVED</h5> 
	                        <hr style="background-color: yellow;">
	                        <p class="card-text"> 
	                        	80K
	                        </p>
	                        <a href="https://www.statista.com/topics/5982/road-accidents-in-india/" >You can Check Here</a> 
	                    </div> 
	                </div> 
	            </div> 
	        </div> 
    		</div>

		</div>
	</div>

	<div class="sectionFifth" id="ourService">
		<div class="container">
			<h1 class="sectionFifthTitle">BUT WAIT, WHAT ACTUALLY OUR PRODUCT DOES?</h1>
			<div class="sectionFifthSubTitle">
				<p>WHEN YOU INSTALL OUR PRODUCT IT WILL SEND NOTIFICATION TO THE NEAREST AMBULANCE , AND POLICE STATIONS AND ALSO TO THE REALTIVES ABOUT THE ACCIDENT ALONG WITH THE EXACT PLACE OF ACCIDENT</p>
			</div>
		</div>
	</div>



	<div class="sectionSixth" id="DontWaitToGetProduct">
		<div class="container">
			<h1 class="sectionSixthTitle">SO WHAT ARE YOU WAITING FOR?</h1>
			<center><p class="sectionSixthContent">Just <a href="about_contact_us.php" style="text-decoration: none; color:#f2f2f2;  ">GRAB</a> our product and service and be fearless. <span style="font-weight: 555;"><br><b>let us handle the rest </b></span></p></center>
		</div>
	</div>




	<div class="SectionSeventh" id="whoAreWe">
	 		<!-- <img class="curve"src="images/SecondLandingPageCurve.png" style=" width: 100%; height: 600px;"> -->
	 		<div class="container">
	 			<center><h1 class="seventhSectionTitle">BY THE WAY, WHO ARE WE ?</h1></center>
				<div class="row">
				  <div class="col-sm-12 col-md-6 col-lg-3">
				    <div class="card" style="margin-bottom: 25px;  border-radius: 20px; border-color: white;">
				      <img src="sanjyot.png" style="border-radius: 50%;"><hr style="background-color: red;">
				      <div class="card-body">
				        <h5 class="card-title">Sanjyot Velip</h5>
				        <p class="card-text">An Enthusiastic Front-end Designer, Thinker and Innovator</p>
				        <hr style="background-color: #909090">
				        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				       	<div id="IndividualSocialMedia"> <center>
					        	<a href="#" class="fa fa-facebook"></a>
					        	<a href="#" class="fa fa-twitter"></a>
					        	<a href="#" class="fa fa-instagram"></a>
					        	<a href="#" class="fa fa-google"></a> </center>
					    </div>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-12 col-md-6 col-lg-3">
				    <div class="card" style="margin-bottom: 25px;border-radius: 20px; border-color: white;">
				      <img src="baban.jpg" style="border-radius: 50%;"><hr style="background-color: red;">
				      <div class="card-body">
				        <h5 class="card-title">Baban Ghadi</h5>
				        <p class="card-text">An Enthusiastic Front-end Design and Developer And Innovator</p>
				        <hr style="background-color: #909090">
				       <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
				       <div id="IndividualSocialMedia"> <center>
					        	<a href="#" class="fa fa-facebook"></a>
					        	<a href="#" class="fa fa-twitter"></a>
					        	<a href="#" class="fa fa-instagram"></a>
					        	<a href="#" class="fa fa-google"></a> </center>
					    </div>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-12 col-md-6 col-lg-3">
				    <div class="card" style="margin-bottom: 25px; border-radius: 20px; border-color: white;">
				      <img src="kanaiya.jpg" style="border-radius: 50%;"><hr style="background-color: red;">
				      <div class="card-body">
				        <h5 class="card-title">Kanaiya Dessai</h5>
				        <p class="card-text">An Enthusiastic Hardware Design and Developer and a Innovator</p>
				        <hr style="background-color: #909090">
				       	
				       	<div id="IndividualSocialMedia"> <center>
					        	<a href="#" class="fa fa-facebook"></a>
					        	<a href="#" class="fa fa-twitter"></a>
					        	<a href="#" class="fa fa-instagram"></a>
					        	<a href="#" class="fa fa-google"></a> </center>
					    </div>
				        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-12 col-md-6 col-lg-3">
				    <div class="card" style="margin-bottom: 25px; border-radius: 20px; border-color: white;">
				      <img src="arun.jpg" style="border-radius: 50%;"><hr style="background-color: red;">
				      <div class="card-body">
				        <h5 class="card-title">Arun Ganachari</h5>
				        <p class="card-text">An Enthusiastic Full Stack Developer and Thinker</p>
				        <hr style="background-color: #909090">
				        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				        <div id="IndividualSocialMedia"> <center>
					        	<a href="#" class="fa fa-facebook"></a>
					        	<a href="#" class="fa fa-twitter"></a>
					        	<a href="#" class="fa fa-instagram"></a>
					        	<a href="#" class="fa fa-google"></a> </center>
					    </div>
				      </div>
				    </div>
				  </div>
				</div>

				</div>
	 		</div>


	 	<div class="sectionEight" id="footer">
	 		<div class="container">
	 		<div class="row" >
				  <div class="col-sm-12 col-md-4 col-lg-4" id="startFooter">
				    <div class="card logoSection" style="margin-bottom: 25px; ">
				      <div class="card-body">
				        <center><img src="logo.jpg" style="width:200px;height:200px;border-radius:50px;"></center> 
				       		<p id="websiteUrl">meisme.000webhostapp.com</p>
				        	<div id="websiteSocialMedia"> <center>
					        	<a href="#" class="fa fa-facebook"></a>
					        	<a href="#" class="fa fa-twitter"></a>
					        	<a href="#" class="fa fa-instagram"></a>
					        	<a href="#" class="fa fa-google"></a> </center>
					        </div>
				      </div>
				    </div>
				  </div>
				  
				  <div class="col-sm-12 col-md-4 col-lg-4  " id="startFooter">
				    <div class="card FooterUsefullLinks" style="margin-bottom: 25px; ">
				     
				      <div class="card-body ">
				        <h5 class="card-title">Usefull Links</h5><hr style="background-color: black;">
				        <ul>
				        	<li><a  href="#home">Home</a></li>
				        	<li><a  href="#ourService">Service we Provide</a></li>
				        	<li><a  href="#getProductAndService">Get Our Services</a></li>
				        	<li><a  href="register.php">Register</a></li>
				        	<li><a  href="login.php">Login</a></li>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-12 col-md-4 col-lg-4" id="startFooter">
				    <div class="card FooterReachOutUs" style="margin-bottom: 25px; ">
				     
				      <div class="card-body">
				        <h5 class="card-title">Reach Out Us</h5><hr style="background-color: black;">
				        <ul>
				        	<li><a  href="about_contact_us.php">About Us</a></li>
				        	<li><a  href="about_contact_us.php">Contact Us</a></li>
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>
		</div>
	 	</div>



	 	 <div class="copyright" style="background-color: #E2BFBF; padding: 10px; margin-top: -50px;">
			<center>
				<hr style="background-color: red;">
				<p style="font-weight: 555;">Copyright 2021 - Future by 4LionsTech: made with love. All Rights Reserved.</p>
			</center>
	</div>

</body>

<!--=====================================  script for user side navigation when he/she loggs in ========================== -->
    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("userNav").style.marginLeft = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("userNav").style.marginLeft= "0";
    }
    </script>  
<!--=====================================  end of script for user side navigation when he/she loggs in ========================== -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>