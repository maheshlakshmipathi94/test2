<?php
include 'db_details.php';

 date_default_timezone_set("Asia/Kolkata");
$dbc = mysqli_connect($host, $username, $password, $database);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, $database);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}


$values = mysqli_query($dbc, "SELECT dates,email,password,remarks FROM `air_purifier_login` WHERE email='".$_GET["email"]."' ");
$yourArray = array(); // make a new array to hold all your data
$index = 0;
while($row = mysqli_fetch_assoc($values)){ // loop to store the data in an associative array.
     $yourArray[$index] = $row;
     $index++;
}


 echo '[{"password":"'.$yourArray[0]['password'].'","dates":"'.$yourArray[0]['dates'].'","email":"'.$yourArray[0]['email'].'","remarks":"'.$yourArray[0]['remarks'].'"}]';
 ?>