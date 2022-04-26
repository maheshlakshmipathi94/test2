<?php

include 'db_details.php';


 
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




   
    if(mysqli_query($dbc, "DELETE FROM app_users WHERE email ='".$_GET["email"]."'"))
    {

echo "Records deleted successfully.";
    }
else
{
    echo "error deleting";
}
  	

          
?>