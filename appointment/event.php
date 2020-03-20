<?php
include_once("connect.php");
$sqlEvents = "SELECT * FROM `appointment_time`,`user_detils` where `appointment_time`.`user_id`=`user_detils`.`id`";
 
$resultset = mysqli_query($mysql_link, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	


	// convert  date to milliseconds
	$start = strtotime($rows['appoinment_day']) * 1000;
	$end = strtotime($rows['appoinment_day']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['fname']." ".$rows['lname']."--".$rows['address'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>