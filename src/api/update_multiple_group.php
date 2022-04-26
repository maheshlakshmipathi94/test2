<?php

include 'db_details.php';
date_default_timezone_set("Asia/Kolkata");
$link = mysqli_connect($host, $username, $password, $database);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$date = date('Y-m-d H:i:s');

$string = $_GET["id"];

$tags = explode(',' , $string);


foreach($tags as $i =>$key) {

    echo $key .'</br>';
    $sql = "UPDATE device_list SET groups='".$_GET["groups"]."'  WHERE id='$key' AND email='".$_GET["email"]."'" ;
if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}
mysqli_close($link);

?>