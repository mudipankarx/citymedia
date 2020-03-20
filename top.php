<?php 
if($_SESSION["size"]=='')
{
	echo "<script>window.location='book.php'</script>";
}
if(isset($session_id)&&$session_id!=''){
$select_temp="select * from `temp_rec` where `session_id`='".$session_id."'";
$fetch_temp=mysqli_query($mysql_link,$select_temp);
}

$select_size="select * from `size` where `id`='".$_SESSION["size"]."'";
$size_query=mysqli_query($mysql_link,$select_size);
$size=mysqli_fetch_array($size_query);
if(isset($_SESSION["type"])&&$_SESSION["type"]!='')
{
$select_type="select * from `bracket_type` where `bracket_id`='".$_SESSION["type"]."'";
$type_query=mysqli_query($mysql_link,$select_type);
$type=mysqli_fetch_array($type_query);
}
if(isset($_SESSION["wall_price"])&&$_SESSION["wall_price"]!='')
{
$wall_price=$_SESSION["wall_price"];
}
?>
