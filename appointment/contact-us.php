<?php
include_once('header_main.php');
if(isset($_POST['save']))
{
	$to = "srmukherjee27@gmail.com";
	$subject = "Contact Us Request";
	$txt = "Hello Admin<br/>,<p>Your Message is --</p>
	<p>Name --'".$_POST['uname']."'</p>
	<p>Email --'".$_POST['email']."'</p>
	<p>Phone --'".$_POST['phone']."'</p>
	<p>User Message</p>
	<p>'".$_POST['message']."'</p>";
	$headers = "From: webmaster@example.com" . "\r\n" .
	"CC: somebodyelse@example.com";

	//if(mail($to,$subject,$txt,$headers))
	//{
		$message="Your Message sent sucessfully";
	//}
}
?>
<!-- inner_page_banner_sec -->
	<section class="inner_page_banner_sec parallax_effect-" style="background-image:url('images/inner_banner_about.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" style="position:relative;">
					<div class="inner_banner_content">
						<h1>Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="contact_page_details_sec no_visi" style="">
	<div class="container">

	
		<div class="row">
			<div class="col-md-6">
				<div class="contact_details_box">
					<ul class="list_contact_details">
						<li>
							<div class="cl_box">
								<div class="c_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
								<h4>Give us a call</h4>
								<h5>215-550-1291</h5>
							</div>
						</li>
						<li>
							<div class="cl_box">
								<div class="c_icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
								<h4>Send us an email</h4>
								<p>admin@tvtrap.com</p>
							</div>
						</li>
						<li>
							<div class="cl_box">
								<div class="c_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
								<h4>Drop by and talk</h4>
								
							<p>Lorem ipsum dolor sit amet,<br>
consectetur adipiscing elit, sed</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="c_form_area"><?php if(isset($message)){?><span style="color:green; font-weight:600;"><?php echo $message;?><?php } ?></span>
					<form class="contact_form" name="contact" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" name="uname" placeholder="Name." required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email." required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" name="phone" class="form-control" placeholder="Phone No." required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<textarea type="text" rows="3" class="form-control" placeholder="Message." name="message" required></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" name="save" class="btn btn_f_submit button_effect_aylen">Submit</button>
								</div>
							</div>
						</div>
					
					</form>
				</div>
			</div>
			
		</div>
		
	</div>
</div>
<!-- map area -->
 <section class="contact_map_area no_visi">
	<div class="map_box">
		
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471218.3856138947!2d88.04953416603917!3d22.676385752052724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1581330853968!5m2!1sen!2sin"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
</section>

<?php
include_once('footer _main.php');
?>
