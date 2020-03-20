<?php
$servername = "204.93.216.11";
$username = "wisiplor_ctmedia";
$password = "ctmedia@1";

// Create connection
$mysql_link = mysqli_connect($servername, $username, $password);

// Check connection
if (!$mysql_link) {
    die("Connection failed: " . mysqli_connect_error());
}else{
  //echo "Connected successfully";
}
$db_selected = mysqli_select_db($mysql_link, "wisiplor_ctmedia");
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
//mysqli_select_db('db1', $db1);*/
/*$mysql_link = mysqli_connect("localhost","root","") or die(mysql_error());
       // mysqli_select_db("emp",$mysql_link) or die(mysql_error());
  mysqli_select_db($mysql_link, "emp");*/

?>