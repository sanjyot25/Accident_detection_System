<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id16501289_arun');//db username
define('DB_PASSWORD', 'ytlS>[!6nH7(n>4R');//db password
define('DB_NAME', 'id16501289_ads');//id14549843_project
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    echo "connected to mysql database";
}
?>