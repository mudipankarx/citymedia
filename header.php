<?php 
session_start();
$session_id=session_id();
include_once('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>City Wide Media</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/booking.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link href="css/animate.css" rel="stylesheet">
<link href="css/pe-icon-7-stroke.css" rel="stylesheet">
<link href="css/stellarnav.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<style type="text/css">

.my-cart-wrapper
{
	top:102px;
}
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
<nav class="nav_sec relative_header" id="sticky-wrap">
  <div class="container">
    <div class="nav_inner">
      <div class="logo_area"> 
			<div class="logo_box">
		  	<a class="" href="index.php"><img src="images/logo.png" alt="" /></a>
		  </div>
		</div>
      <div class="nav_area">
        <div class="stellarnav">
          <ul>
            <li ><a href="index.php">Home</a></li>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
            <li><a href="contact-us.php">CONTACT US</a></li>			
           <?php

            if(isset($_SESSION["admin_id"])&&$_SESSION["admin_id"]!=''){?>
            <li><a href="logout.php">Logout</a></li>
          <?php }else{ ?>
            <li class="li_head_book"><a href="book.php">Book Now</a></li>
          <?php } ?>
			  <!--<li><a href="">Dropdown</a>
		    	<ul>
		    		<li><a href="#">Here's a very long item.</a>
		    			<ul>
				    		<li><a href="#">Item</a></li>
				    		<li><a href="#">Item</a></li>
				    		<li><a href="#">Item</a></li>
				    		<li><a href="#">Item</a></li>
		    			</ul>
		    		</li>
					<li><a href="">Dropdown Item</a></li>
					<li><a href="">Dropdown Item</a></li>
		    	</ul>
		    </li>-->
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<section class="inner_banner_txt_sec">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Booking</h1>
			</div>
		</div>
	</div>
</section>
<!--<section class="inner_page_banner_sec parallax_effect-" style="background-image:url('images/inner_banner_about.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" style="position:relative;">
					<div class="inner_banner_content">
						<h1>Booking</h1>
					</div>
				</div>
			</div>
		</div>
	</section>-->