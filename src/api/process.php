<?php
session_start();
include 'db_details.php';
date_default_timezone_set("Asia/Kolkata");
$link = mysqli_connect($host, $username, $password, $database);
 $message;
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$date = date('Y-m-d H:i:s');
//Your authentication key
$authKey = "202838Apk6jEHKI5aa8f2ba";
//Multiple mobiles numbers separated by comma
$mobileNumber = $_GET["phone"];
$plate = $_GET["plate"];
//Senhile using route4 sender id should be 6 characters long.
$senderId = "ANPRIN";
if (strpos($plate, 'N') !== false) {
 $message = urlencode("Hello Mahesh,Welcome to XXXX mall. Avail the premium offer on insurance for your vehicle HONDA AMAZE @ 8,000INR now. Click the below link to know further details http://159.89.161.64:8083/#/insuapkstart");
}
else if(strpos($plate, 'J') !== false) {
 $message = urlencode("Hello Mahesh,Welcome to XXXX mall. Avail the premium offer on insurance for your vehicle TATA TIAGO @ 6,500INR now. Click the below link to know further details http://159.89.161.64:8083/#/insuapkstart");
}

else if(strpos($plate, 'H') !== false) {
 $message = urlencode("Hello Mahesh,Welcome to XXXX mall. Avail the premium offer on insurance for your vehicle SUZUKI SWIFT @ 7,500INR now. Click the below link to know further details http://159.89.161.64:8083/#/insuapkstart");
}

else if(strpos($plate, 'R') !== false) {
 $message = urlencode("Hello Mahesh,Welcome to XXXX mall. Avail the premium offer on insurance for your vehicle HYUNDAI SANTRO @ 4,500INR now. Click the below link to know further details http://159.89.161.64:8083/#/insuapkstart");
}


//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
'authkey' => $authKey,
'mobiles' => $mobileNumber,
'message' => $message,
'sender' => $senderId,
'route' => $route
);
//API URL
$url="https://control.msg91.com/api/sendhttp.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}
curl_close($ch);
if(isset($_POST['btn-save']))
{
$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
$_SESSION['phone']=$_POST['phone'];
$_SESSION['otp']=$rndno;
header( "Location: /rovy/o56tp.html" );
 } ?>