<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('PHPMailer/autoload.php');
include_once('header.php');
session_unset();
session_destroy();
 
$id=$_GET['rec'];
 $ses_id=base64_decode($id);
$select_query="select * from `user_detils`,`appointment_time` where `user_detils`.`id`=`appointment_time`.`user_id` and `user_detils`.`id`='".$ses_id."'";
$query=mysqli_query($mysql_link,$select_query);
$rec=mysqli_fetch_array($query);

$select_pro="select * from `temp_rec` where `user_id`='".$ses_id."'";
$query_pro=mysqli_query($mysql_link,$select_pro);

$select_other="select * from `other_iteams` where `user_id`='".$ses_id."'";
$query_other=mysqli_query($mysql_link,$select_other);

if(isset($_GET['rec'])&&$_GET['rec']!='')
{

	$message = '<!DOCTYPE html><html lang="en"><head>
<title>Message Success</title>
<meta charset="utf-8">
</head>

<body bgcolor="#ffffff">
<table class="body-wrap" align="center" border="0" cellpadding="0" cellspacing="0" width="680"  style="border:solid 1px #ccc; margin:0 auto;">
  <tbody>  
    <tr>
      <td bgcolor="#fff" style="border-bottom:1px solid #f8f2f1;"><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%; padding:10px;">
          <tr>
            
            <td align="center"><a href="" title="Logo"><img  alt="Logo" src="http://'.$_SERVER['SERVER_NAME'].'/appointment/images/logo_mail.png" ></a></td>
          </tr>
        </table></td>
    </tr>  
    <tr>
      <td style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;color:rgb(67, 67, 68);font-size:12px; padding: 10px 30px;" bgcolor="#fff"><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%; padding:10px 0;">
          <tr>
            <td style="font-family:tahoma, geneva, sans-serif;color:rgb(67, 67, 68);font-size:12px; line-height:18px;" valign="top" >
				<p style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/appointment/images/success_mail.png" alt="" style="width:100px;"/></p>
				
              <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 24px; line-height: 1.4; color: #091d42; font-weight: 600; text-align: center;padding: 0; margin: 10px 0 10px 0;">Congratulations <span style="color:#0066ff;">'.$rec['fname']." ".$rec['lname'].'</span>! <br>Your appointment is confirmed</p>
              </td>
          </tr>
          <tr>
          	<td style="text-align: left;">
			<br>
				 <h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Appointment details</h3>
				 <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>Time : </span> '.$rec['appointment_time'].'</p>
				  <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 6px 0;"><span>Address : </span> '.$rec['address'].'</p>
				  <h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Order summary</h3>';
				$price=0;
						while($rec_pro=mysqli_fetch_array($query_pro)){
							
							$amount=$rec_pro['size_price']+$rec_pro['type_pric']+$rec_pro['wall_type_price'];
							$price=$price+$amount;	
				$message .='<p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>TV Mounting : </span></p>
				 <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>'.$rec_pro['size'].' : </span> $ '.$price.'</p>';
						}
					$message .='<h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Other Iteams</h3>';
               $othe_price=0;
						while($rec_other=mysqli_fetch_array($query_other)){
						$othe_price=$othe_price+$rec_other['oprice'];
						
					 $message .='<p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>'.$rec_other['okey'].' : </span> $ '.$rec_other['oprice'].'</p>';		
				}	
    $tp=$price+$othe_price;				
				  $message .='<p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 6px 0;"><span>Total Price : </span> $'.$tp.'</p>
				  
					
			</td>
          </tr>

        
        </table></td>
    </tr>
   
    <!-- content end -->
    <!-- footer -->
    <tr>
      <td ><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%; padding:5px 10px;" bgcolor="#676767">
          <tr>
            <td style="text-align: center;"><p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;color: #fff; font-size: 14px;line-height: 20px; margin: 5px 0 5px 0;">City wide media© All right reserved 2020</p></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';
	$subject = "Appointment booking confirmation mail";
       $mail = new PHPMailer();
	//Enable SMTP debugging. 
	$mail->SMTPDebug = 0;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();       
	$mail->CharSet="UTF-8";
	$mail->Debugoutput = 'html';     
	//Set SMTP host name   
	$mail->Host = 'mail.indioscotechnologies.com';
	$mail->Port = 25;
	//$mail->Port = 465;
	//$mail->SMTPSecure = '';
	//$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->IsHTML(true);
	$mail->Username = 'no-reply@indioscotechnologies.com';
	$mail->Password = 'Indiosco@123';
	$mail->From = 'arindom@winsomeitsolutions.com';
	$mail->FromName = 'Winsome';
	$mail->AddAddress($rec['email']);
	
	$mail->Subject = $subject;
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail->Body = $message;
	$mail->Send();
}

?>


<section class="thankyou_sec">
	<div class="container">
		<div class="thankyou_inner">
			<div class="row ">
				<div class="col-sm-12 thanks_head">
					<h2>Congratulations <?php echo $rec['fname']." ".$rec['lname'];?>! Your
	appointment is confirmed</h2>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="thankyou_left">
						<h3>Appointment details</h3>
						<ul class="list_order">
							<li><span class="thank_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
								<?php echo $rec['appoinment_day'];?>, <?php echo $rec['appointment_time'];?></li>
							<li><span class="thank_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<?php echo $rec['address'];?></li>
						</ul>
						<br>
						<h3>Order summary</h3>
						<ul class="list_order2"><?php 
						$price=0;
						while($rec_pro=mysqli_fetch_array($query_pro)){
							
							$amount=$rec_pro['size_price']+$rec_pro['type_pric']+$rec_pro['wall_type_price'];
							$price=$price+$amount;?>
						   
							<li><p><b>TV Mounting</b></p></li>
							<li><p><?php echo $rec_pro['size'];?></p></li>
							
						<?php } ?> 
						<li><p><b>Other Iteams</b></p></li>
						<?php 
						$othe_price=0;
						while($rec_other=mysqli_fetch_array($query_other)){
						$othe_price=$othe_price+$rec_other['oprice'];	
							?>
						   
							<li><p><?php echo $rec_other['okey'];?>&nbsp;&nbsp;&nbsp;-- $<?php echo $rec_other['oprice'];?></p></li>
						<?php }?>
						<li><p>Total Price -- <b> $<?php echo $price+$othe_price;?></b></p>
							</li>
						  </ul>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-12 thankyou_right_main">
					<div class="thankyou_right">
						<img src="images/success.png" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

</section>


<?php
include_once('footer.php');
?>