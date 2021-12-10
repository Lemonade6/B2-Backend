<?php
$servername = "localhost";
$dbname="esamissions";
$username = "root";
$password = "";
// Create connection
$con=mysqli_connect($servername, $username , $password ,$dbname);
// Check connection
if ($con==false) {
  die("Connection failed");
}
echo "";
?>