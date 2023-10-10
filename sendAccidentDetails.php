<?php include 'config.php' ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/emergencylive/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/emergencylive/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/emergencylive/SMTP.php';

//cordinates of ponda where we assume the accident took place and this details are taken from user for testing purpose 

//$lat = 15.2792;  //value will be given by aurdino
//$lng = 74.1211;  //value will be given by aurdino
//$accident_status = 0;
//$forceValue = 1234;
//$chessi_number = "905663dfgre34"; //value will be given by aurdino
//$place = "kalay";

/* =================================================================== */
    
    // Get date and time variables
    date_default_timezone_set('Asia/Kolkata');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");
    
    //access values from arduino uno R3
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $accident_status = $_POST['as'];
    $forceValue = $_POST['forceV'];
    $chessi_number1 = $_POST['cn'];
    
  //  if(!empty($lat) && !empty($lng)){                      // comment this when data isto be received from arduino
    if(!empty($_POST['lat']) && !empty($_POST['lng']) )  // if data received from arduino is not empty then do the further processing
    {
       //capture only 13 character of the chessi number and also remove the new line character.
        $chessi_number = preg_replace("/\r|\n/", "", $chessi_number1);

        // insert accident detials in your accident table in database here
        $accidentRecoreded = mysqli_query($conn,"INSERT INTO `accident`(`accident_latitude`, `accident_longitude`, `chessi_number`,`forceValue`,`accidentStatus`,Date,Time) VALUES ('".$lat."', '".$lng."', '".$chessi_number."', '".$forceValue."', '".$accident_status."', '".$d."', '".$t."')");
           
        if($accidentRecoreded){echo "values are updated in the database table";}
        else{echo "couldnot insert data into the database table";}
        
        //accessing user details met ith an accident
        $userData =  mysqli_query($conn,"SELECT  `name`, `mob_number` FROM `registered_user` WHERE  `chessi_number`='$chessi_number'");
        while($row = mysqli_fetch_array($userData)){
            $u_name = $row['name'];
            $u_reg_number = $row['mob_number'];
        }
        
    
        //check accident is fatal or not w.r.t accident status value receved from aurdino 
        if($accident_status){
            //if the accident is non fatal donot send email to ambulance
        }
        else{
            $a_count=0; // to access the row containing smallest km distance
            //query for getting nearest ambulance
            $nearest_ambulance = mysqli_query($conn,"SELECT *,  (((acos(sin((".$lat."*pi()/180)) * sin((`latitude`*pi()/180)) + cos((".$lat."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".$lng."- `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `ambulance_details` order by distance ASC ") ;
            
            while(($row = mysqli_fetch_array($nearest_ambulance)) && ($a_count<1)){
                if ($row['ambulance_Status'] == 1) { // if ambulance_status is 1 that means the ambulance is free  
                      ++$a_count ;
                      echo "Ambulance Details : "; echo "<br>";
                      $a_plateNo = $row['a_plateNo'];
                      echo $a_plateNo; 
                      echo "<br>";
                      $a_email = $row['A_email']; 
                      echo $a_email; 
                      echo "<br>";
                      echo "ambulance place :";
                      echo $row['place'];
                      echo "<br>";
                      echo round($row['distance'] * 1.609344)."km"; echo "<br>";
                      
                      $ambulance_status_update = mysqli_query($conn,"UPDATE `ambulance_details` SET `ambulance_Status` = '0' WHERE a_plateNo='$a_plateNo' ");
                    }
                }
            }    
    
        $p_count=0;
        // query for getting nearest police station
        $nearest_police_station = mysqli_query($conn,"SELECT *, (((acos(sin((".$lat."*pi()/180)) * sin((`p_latitude`*pi()/180)) + cos((".$lat."*pi()/180)) * cos((`p_latitude`*pi()/180)) * cos(((".$lng."- `p_longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344)  as distance FROM `police_details` order by distance ASC ") ;   
                  
        while(($row = mysqli_fetch_array($nearest_police_station)) and ($p_count<1)){
                ++$p_count ;       
                  echo "police Details : ";
                  $p_email = $row['p_email']; 
                  echo $p_email; 
                  echo "<br>";
                  echo "police place :";
                  $p_place = $row['p_place'];
                  echo $row['p_place'];
                  echo "<br>";
                  echo round($row['distance'] * 1.609344)."km"; echo "<br>";     
             }
    
        //query for getting relatives details
        $relative_details = mysqli_query($conn,"SELECT r_email from relative_details as rel, registered_user as reg where reg.chessi_number='$chessi_number' and reg.username = rel.username ");
         
        while($row = mysqli_fetch_array($relative_details)){ 
            echo "Relatives Details <br>";
            $relative_email = $row['r_email']; 
            echo $relative_email;
            echo "<br>";
         }
    
         //accident location gmaps link
        $glink ="http://maps.google.com/maps?&z=15&mrt=yp&t=m&q=$lat+$lng";
    
        //puting the email id's in an array
        if($accident_status){  //if non-fatal accident takes place..
            $to_email =  array($p_email,$relative_email);
        }else{ //if fatal-accident takes place
        
            if($a_count === 0){ // accident is fatal but no ambulances are free
                $to_email =  array($p_email,$relative_email);
            }else{ // accident is fatal and ambulance is available
             $to_email =  array($a_email,$p_email,$relative_email);   
            }
            
        }
        
        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; //gmail port 
        $mail->SMTPSecure = 'ssl'; // ssl is deprecated
        $mail->SMTPKeepAlive = true;
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = true;
        $mail->Username = 'arunganachari0@gmail.com'; // email
        $mail->Password = 'itscontraversial'; // password
        $mail->setFrom('arunganachari0@gmail.com', 'Emergency Service Provider'); // From email and name
        
        foreach ($to_email as $email) {
        	echo $email;
        	$mail->addAddress($email); // to email and name
        	echo "<br>";
        }
        
        $mail->Subject = 'An accident took place.';
    
        //selecting message body to send to the respective authority
        if($accident_status){ //if accident is non-fatal
            $mail->msgHTML("User named " .$u_name. ", Register no: " .$u_reg_number. " has met with accident near ".$glink. " Police station : ".$p_place." are in action");
        }
        else{ //if accident is fatal
        
            if($a_count === 0){  // but no ambulances are available
                 
                 $mail->msgHTML("User named " .$u_name. ", Register no: " .$u_reg_number. " has met with accident near ".$glink. " Police station : ".$p_place." are in action. No Ambulances are currently available so, Police-in-action, please do the needful in this situation");
                 
            }else{ // ambulances are availble
                $mail->msgHTML("User named " .$u_name. ", Register no: " .$u_reg_number. " has met with accident near ".$glink." . Ambulance : ".$a_plateNo. ", Police Station : ".$p_place." are in action");
            }
        }
    
    
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "Message sent!";
        }
    
}else{
    echo "didnot receive any data from aurduino";
}