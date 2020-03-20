<?php
session_start();
if(isset($_POST['mail']))
{
	$to = "srmukherjee27@gmail.com";
	$subject = "Leave your phone number";
	$txt = "Hello Admin<br/>,<p>Your have a call back request --</p>
	<p>Name --'".$_POST['uname']."'</p>	
	<p>Phone --'".$_POST['phone']."'</p>";
	$headers = "From: webmaster@example.com" . "\r\n" .
	"CC: somebodyelse@example.com";

	//if(mail($to,$subject,$txt,$headers))
	//{
		$call_back="Your Message sent sucessfully";
	//}
}?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>City Wide Media</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link href="css/animate.css" rel="stylesheet">
<link href="css/pe-icon-7-stroke.css" rel="stylesheet">
<link href="css/stellarnav.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<style type="text/css">
.li_head_book{
    background: #ffd400;
    border-radius: 6px;  
    text-align: center;  
    vertical-align: middle;
}
.nav_sec .stellarnav > ul > li:last-child > a {
padding: 10px !important;
}
</style>
</head>
<body>
<!-- mobile_top_header -->
<section class="mobile_top_header">
	<div class="container">
		<div class="col-sm-12">
			<ul>
				<li><a href="book.php"><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span> Book Now</a></li>
				<li><a href="" data-toggle="modal" data-target="#call_modal"><span><i class="fa fa-phone" aria-hidden="true"></i></span> Enquiry</a></li>
			</ul>
		</div>
	</div>
</section>
<nav class="nav_sec" id="sticky-wrap">
  <div class="container">
    <div class="nav_inner">
      <div class="logo_area"> 
			<div class="logo_box">
		  	<a class="" href="index.php"><img src="images/logo.png" alt="" /></a>
		  </div>
		</div>
      <div class="nav_area">
        <div class="stellarnav">
          <?php
            $page=$_SERVER['REQUEST_URI'];
$exp=explode('/',$page);
//print_r($exp);
$name=$exp[1];

?>
        <ul>
           <li <?php if(($name=='index.php')||($name=='')) {?>class="active"<?php } ?>><a href="index.php">Home</a></li>
           <li <?php if($name=='about-us.php') {?>class="active"<?php } ?>><a href="about-us.php">About Us</a></li>
           <li <?php if($name=='testimonials.php') {?>class="active"<?php } ?>><a href="testimonials.php">Testimonials</a></li>
           <li <?php if($name=='contact-us.php') {?>class="active"<?php } ?>><a href="contact-us.php">CONTACT US</a></li>
          
<?php
if(isset($_SESSION["admin_id"])&&$_SESSION["admin_id"]!=''){?>
<li><a href="logout.php">Logout</a></li>
<?php }else{ ?>
 <li class="li_head_book"><a href="book.php">Book Now</a></li>
<?php } ?>
</ul>

 <!--<ul>
           <li <?php if(($name=='index')||($name=='')) {?>class="active"<?php } ?>><a href="index">Home</a></li>
           <li <?php if($name=='about-us') {?>class="active"<?php } ?>><a href="about-us">About Us</a></li>
           <li <?php if($name=='testimonials') {?>class="active"<?php } ?>><a href="testimonials">Testimonials</a></li>
           <li <?php if($name=='contact-us') {?>class="active"<?php } ?>><a href="contact-us">CONTACT US</a></li>
<?php
if(isset($_SESSION["admin_id"])&&$_SESSION["admin_id"]!=''){?>
<li><a href="logout.php">Logout</a></li>
<?php } ?>

</ul>-->

        </div>
      </div>
    </div>
  </div>
</nav>