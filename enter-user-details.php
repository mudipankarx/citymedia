<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('PHPMailer/autoload.php');
include_once('header.php');
include_once('top.php');
if(isset($_POST['fname'])&&$_POST['fname']!='')
{
	
	$date=date('Y-m-d');
	$address=$_SESSION["address"];
	$instructions=$_SESSION["address_instructions"];	
	$wall_price=$_SESSION["wall_price"];
    $wall_type=$_SESSION["wall_type"];
	$day=$_SESSION["selected_day"];
	$ext_date=date('M').'-'.$day.'-'.date('Y');
	$time=$_SESSION["selected_time"];
	
	$insert_user="INSERT INTO `user_detils` (`session_id`, `fname`, `lname`, `email`, `phone`,`address`,`address_instructions`,`date`) VALUES ('".$session_id."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$_POST['phone']."','".$address."','".$instructions."','".$date."')";
	$insert_query=mysqli_query($mysql_link,$insert_user);
	$last_id = mysqli_insert_id($mysql_link);
	if(isset($_SESSION['old'])){
		foreach($_SESSION['old'] as $list_old){
		        $count=count($list_old);
				if($count>=1){	
				   $insert_rec="INSERT INTO `temp_rec` (`user_id`, `session_id`, `size`, `size_price`, `type`, `type_pric`, `wall_type_title`, `wall_type_price`, `date`) VALUES ('".$last_id."', '".$session_id."', '".$list_old['size_name']."', '".$list_old['size_price']."', '".$list_old['bracket_type_title']."', '".$list_old['bracket_type_price']."', '".$list_old['wall_type_title']."', '".$list_old['wall_type_price']."', '".$date."')";
				   $insert_query=mysqli_query($mysql_link,$insert_rec);
				}
		}
	}
	$insert_rec2="INSERT INTO `temp_rec` (`user_id`, `session_id`, `size`, `size_price`, `type`, `type_pric`, `wall_type_title`, `wall_type_price`, `date`) VALUES ('".$last_id."', '".$session_id."', '".$size['name']."', '".$size['price']."', '".$type['title']."', '".$type['price']."', '".$wall_type."', '".$wall_price."', '".$date."')";
	  $insert_query2=mysqli_query($mysql_link,$insert_rec2);
	  
	  $insert_rec4="INSERT INTO `appointment_time` (`user_id`, `session_id`, `appoinment_day`, `appointment_time`) VALUES ('".$last_id."', '".$session_id."', '".$ext_date."', '".$time."')";
	  $insert_query4=mysqli_query($mysql_link,$insert_rec4);
	  
	if(isset($_SESSION['dip'])){
		foreach($_SESSION['dip'] as $rec){
			$insert_rec3="INSERT INTO `other_iteams` (`user_id`, `session_id`, `okey`, `oprice`) VALUES ('".$last_id."', '".$session_id."', '".$rec['iteam_name']."', '".$rec['iteam_price']."')";
			 $insert_query3=mysqli_query($mysql_link,$insert_rec3);
		}
	}

$select_pro="select * from `temp_rec` where `user_id`='".$last_id."'";
$query_pro=mysqli_query($mysql_link,$select_pro);

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
				
              <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 24px; line-height: 1.4; color: #091d42; font-weight: 600; text-align: center;padding: 0; margin: 10px 0 10px 0;">Congratulations <span style="color:#0066ff;">Admin</span>! <br>Your have a appointment request</p>
              </td>
          </tr>
          <tr>
          	<td style="text-align: left;">
			<br>
				 <h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Appointment details</h3>
				 <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>Time : </span> '.$time.'</p>
				  <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 6px 0;"><span>Address : </span> '.$address.'</p>
				   <h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Contact details</h3>
				 <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>Name : </span> '.$_POST['fname'].' '.$_POST['lname'].'</p>
				  <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 6px 0;"><span>Phone : </span> '.$_POST['phone'].'</p>
				  <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 6px 0;"><span>Email : </span> '.$_POST['email'].'</p>
				  <h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Order summary</h3>';
				 $price=0;
				 while($rec_pro=mysqli_fetch_array($query_pro)){
							
							$amount=$rec_pro['size_price']+$rec_pro['type_pric']+$rec_pro['wall_type_price'];
							$price=$price+$amount;	
							$message .='<p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>TV Mounting : </span></p>
							 <p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>'.$rec_pro['size'].' : </span> $ '.$price.'</p>';
						}
					$message .='<h2 style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 20px; line-height: 1.4; color: #0066ff; font-weight: 600; text-align: left;padding: 0; margin: 10px 0 10px 0;">Other Items</h3>';
                    $othe_price=0;
					foreach($_SESSION['dip'] as $rec){
					$othe_price=$othe_price+$rec['iteam_price'];
						
					         $message .='<p style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 17px; line-height: 1.3; color: #111; font-weight: 400; padding: 0; margin: 0px 0 4px 0;"><span>'.$rec['iteam_name'].' : </span> $ '.$rec['iteam_price'].'</p>';		
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
	$subject = "Client Appointment booking request";
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
	$mail->From = 'arindam@winsomeitsolutions.com';
	$mail->FromName = 'Winsome';
	$mail->AddAddress('sayak@live.in');
	
	$mail->Subject = $subject;
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail->Body = $message;
	$mail->Send();
        echo "<script>window.location='thankyou.php?rec=".base64_encode($last_id)."'</script>";
}

?>
<section class="comman_tb_padding">
<div id="root">
  <div class="app-container">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="booking_header_comman">
					<h2>Where can we send important</h2>
					 <p class="medium-font">updates about your appointment?</p>
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<div class="content-container">
        
        <div class="enter-details-wrapper">
          <div class="enter-details-content-wrapper">
            <div class="new-user-inputs-ab-test-- comman_form_style">
            <form method="post" name="frm8" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<div class="new-input-comp">
                <input type="text" id="fname" name="fname" placeholder="First name">
              </div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<div class="new-input-comp">
                <input type="text" id="lname" name="lname" placeholder="Last name">
              </div>
              </div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<div class="new-input-comp">
                <input type="email" id="email" name="email" placeholder="Email" >
                <div></div>
              </div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
					<div class="new-input-comp">
                <input type="tel" id="phone" name="phone" placeholder="Phone">
              </div>
					</div>
				</div>
				</div>
              
              
              
              </div>
            
              
              <div class="enter-details-continue-button-wrapper">
                <button class="new-action-button" disabled="" type="submit">Request Appointment</button>
              </div>
            </form>
            <div style="margin-bottom: 40px;"></div>
          </div>
          <div class="mobile-details-note">We hate spam.<br>
            Your information is safe with us.</div>
          
        </div>
      </div>
			</div>
			<div class="col-lg-5 col-md-12">
				<div>
        <div class="my-cart-desktop">
          <div class="my-cart-wrapper-not-fixed "></div>
          <div class="my-cart-wrapper my-cart-wrapper-overflow ">
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper my-cart-small-items-wrapper-colored">
                <div class="title-container"><span class="time-title">TV Mounting</span></div>
                <div class="services-aggregation-details-wrapper">
                  <h3><b><?php echo $size['name'];?></b></h3>
                  <div class="services-aggregation-details">
                    <div class="aggregate-service"><span class="service-name">TV Mounting </span><span class="service-price"><b>$<?php echo $size['price'];?></b></span></div>
                    <div class="aggregate-service"><span class="service-name"><?php echo $type['title'];?> </span><span class="service-price"><b>$<?php echo $type['price'];?></b></span></div>
                    <div class="aggregate-service"><span class="service-name"><?php echo $_SESSION["wall_type"];?></span><span class="service-price"><b>$<?php echo $_SESSION["wall_price"];?></b></span></div>
                    <div class="aggregate-service">
                      <?php 
$p=0;
foreach($_SESSION['dip'] as $rec){
	$p=$p+$rec['iteam_price'];
	//print_r($rec);?>
                      <!--<p id="optx">-->
                      <div style="clear:both;"><span class="service-name"><?php echo $rec['iteam_name'];?></span><span class="service-price"><b>$<?php echo $rec['iteam_price'];?></b></span></div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div style="border-top:1px dotted #ccc; padding:5px 0;"></div>
                <?php 
$a=1;
$price1=0;
$total=0;
if(isset($_SESSION['old'])&&$_SESSION['old']!=''){
foreach($_SESSION['old'] as $list_old){
	$count=count($list_old);
	if($count>=1){	
	
?>
                <!--<div class="services-aggregation-details-wrapper"><h3></h3>
<div class="services-aggregation-details">

<div class="aggregate-service">
<span class="service-name"><?php echo $list_old['key'];?> </span>
<span class="service-price"><b>$<?php echo $list_old['val'];?></b></span>
</div>

</div>
</div>-->
                <div class="services-aggregation-details-wrapper">
                  <h3><b><?php echo $list_old['size_name'];?></b></h3>
                  <div class="services-aggregation-details">
                    <div class="aggregate-service"> <span class="service-name">TV Mounting </span> <span class="service-price"><b>$<?php echo $list_old['size_price'];?></b></span> </div>
                    <div class="aggregate-service"> <span class="service-name"><?php echo $list_old['bracket_type_title'];?> </span> <span class="service-price"><b>$<?php echo $list_old['bracket_type_price'];?></b></span> </div>
                    <div class="aggregate-service"> <span class="service-name"><?php echo $list_old['wall_type_title'];?> </span> <span class="service-price"><b>$<?php echo $list_old['wall_type_price'];?></b></span> </div>
                  </div>
                </div>
                <?php 
$price=$list_old['size_price']+$list_old['bracket_type_price']+$list_old['wall_type_price'];
$total=$total+$price;
	}
//total=$price+
	
} 
}

$tot=$total+$size['price']+$type['price']+$wall_price+$p;?>
                <div class="my-cart-small-total-price">
                  <div><span>Total</span><span style="float: right;"><b>$<?php echo $tot;?></b></span></div>
                </div>
                <div class="disclaimer-container"></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper my-cart-small-items-wrapper-colored">
                <div> <span class="time-title">Requested Time</span> </div>
                <div class="my-cart-small-items-text"> <?php echo date('M').' '.$_SESSION["selected_day"].' '.date('Y').','.$_SESSION["selected_time"];?></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper my-cart-small-items-wrapper-colored">
                <div><span class="time-title">Location</span></div>
                <div class="my-cart-small-items-text"><?php echo $_SESSION["address"];?></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper my-cart-small-items-wrapper-colored">
                <div><span class="time-title">Contact Details</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
			</div>
		</div>
      

    </div>
  </div>
</div>
</section>
<?php 
include_once('footer.php');
?>
<script>

$('#phone').keyup(function() {
	
var fname=$('#fname').val();
var lname=$('#lname').val();
var email=$('#email').val();
var phone=$('#phone').val();
//alert(fname);
if((fname!='')&&(lname!='')&&(email!='')&&(phone!=''))
{
	//alert('test');
	$('.new-action-button').attr("disabled", false);
}else{
	$('.new-action-button').attr("disabled", true);
}


});
</script>
  
Disk Space, MB: 0 of Unlimited
Calculate Diskspace
Powered by SolidCP. Copyright © 2016 all rights reserved.Version 1.3.0 (1.3.0)