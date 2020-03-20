<?php
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('PHPMailer/autoload.php');

function sendMail($to, $fn="Pallab", $ln="Mukherjee"){
	$subject = "PHP Test Mail with HTML Body";
	$message = "
	<html>
	<head>
	<title>PHP mail() test with HTML Body</title>
	</head>
	<body>
	<p>This email contains HTML Tags!</p>
	<table>
	<tr>
	<th>Firstname</th>
	<th>Lastname</th>
	</tr>
	<tr>
	<td>{$fn}</td>
	<td>{$ln}</td>
	</tr>
	</table>
	</body>
	</html>
	";
	$mail = new PHPMailer();
	//Enable SMTP debugging. 
	$mail->SMTPDebug = 3;                               
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
	$mail->From = 'no-reply@indioscotechnologies.com';
	$mail->FromName = 'no-reply';
	$mail->AddAddress($to);
	//$mail->AddReplyTo('sales@indioscotechnologies.com', 'Indiosco Sales Team');
	$mail->Subject = $subject;
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail->Body = $message;
	if($mail->Send())
		echo "<br><b>The mail has been sent successfully!</b><br><br>";
	else
		echo "Mailer Error: " . $mail->ErrorInfo;
}

if(isset($_POST['do']) && $_POST['do'] == "Send Mail")
	sendMail($_POST['to'], $_POST['fn'], $_POST['ln']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP mail() test with HTML Body</title>
	</head>
	<body>
		<br><br>
		<font style="color:red;"><b>*</b>After clicking the "Send Mail" button the following form will be submitted and an email with HTML table containing the first & last name will be sent to (can be changed by editing "Recipient E-mail" field) from "no-reply@indioscotechnologies.com".</font>
		<form method="post" action="https://myindiosco.indioscotechnologies.com/lab/mailtest">
			<b>Recipient E-mail:</b>
			<input name="to" value="pallabmukherjee.dgp@hotmail.com" size="100%">
			<br>
			<b>Firstname:</b>
			<input name="fn" value="Pallab" size="100%">
			<br>
			<b>Lastname:</b>
			<input name="ln" value="Mukherjee" size="100%">
			<br>
			<input name="do" type="submit" value="Send Mail">
		</form>
	</body>
</html>