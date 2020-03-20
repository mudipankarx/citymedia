<?php 
include_once('connect.php');

$select_size="select * from `zip` where `zip`='".$_POST['zip']."'";
$size_query=mysqli_query($mysql_link,$select_size);
$size=mysqli_fetch_array($size_query);
$size_num=mysqli_num_rows($size_query);

if($size_num>=1)
{
    echo $size['city'].'_1';
}else{
	echo 0;
}	
?>