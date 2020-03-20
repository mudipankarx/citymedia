<?php 
include_once('header_main.php');
include_once('connect.php');
$id=$_GET['rec'];
 $ses_id=$id;
$select_query="select * from `user_detils`,`appointment_time` where `user_detils`.`id`=`appointment_time`.`user_id` and `user_detils`.`id`='".$ses_id."'";
$query=mysqli_query($mysql_link,$select_query);
$rec=mysqli_fetch_array($query);

$select_pro="select * from `temp_rec` where `user_id`='".$ses_id."'";
$query_pro=mysqli_query($mysql_link,$select_pro);

$select_other="select * from `other_iteams` where `user_id`='".$ses_id."'";
$query_other=mysqli_query($mysql_link,$select_other);

?>
<style>
.btn_call_fixed{
	display:none;
}
</style>
<!-- inner_page_banner_sec -->
	<section class="inner_page_banner_sec parallax_effect-" style="background-image:url('images/inner_banner_about.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" style="position:relative;">
					<div class="inner_banner_content">
						<h1>Details</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="thankyou_sec">
	<div class="container">
		<div class="thankyou_inner">
			<div class="row ">				
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
						<h3>Contact Information</h3>
						<ul class="list_order2">
						    <li>
						        <b>&nbsp;Name :-</b> <?php echo $rec['fname']." ".$rec['lname'];?>,
							</li>
							<li>
							   <b>&nbsp;Email :-</b> <?php echo $rec['email'];?>,
							</li>
							<li>
							   <b>&nbsp;Phone :-</b> <?php if(isset($rec['phone'])){ echo $rec['phone']; }else{ echo 'Not provided';}?>
							</li>
						</ul>
					</div>
				</div>
				<style>
				.summery_div{
					    background: #fff;
                         border: 1px solid #ccc;
                          border-radius: 2px;
                         padding: 10px;
				}
				.tr_class
				{
					 background: #000;
                     color:#fff;
					// font-size:12px;
				}
				.tr_class td
				{
					 border-left:1px dotted #ccc;
					 font-size:13px;
				}
				.tr_normal
				{
					 border-bottom:1px dotted #ccc;
				}
				.tr_normal td
				{
					 font-size:12px;
				}
				</style>
				<div class="col-lg-6 col-md-12 " style="background-color: #f1f1f1;">
					<div class="thankyou_left">
						<h3>Order Summery</h3>
						<ul class="list_order2">
						   
							<li><p><b>TV Mounting</b></p></li>
							<li><!--<p><?php //echo $rec_pro['size'];?><span style="margin-left:70px;">-- $<?php //echo $amount;?></span><span style="margin-left:70px;">+</span></p></p>-->
							<div class="summery_div">
							<table width="100%" style="background-color:#fff;">
							   <tr class="tr_class">
							        <td>Sl.No</td>
								    <td>Tv Size</td>
									<td>Bracket Type</td>
									<td>Wall type</td>
                                    <td>Price</td>									
								</tr><?php 
						$price=0;
						$i=1;
						while($rec_pro=mysqli_fetch_array($query_pro)){
														
							$amount=$rec_pro['size_price']+$rec_pro['type_pric']+$rec_pro['wall_type_price'];
							$price=$price+$amount;?>
								<tr class="tr_normal">
								    <td><?php echo $i++;?></td>
								    <td><?php echo $rec_pro['size'];?></td>
									<td><?php echo $rec_pro['type'];?></td>
									<td><?php echo $rec_pro['wall_type_title'];?></td>
									<td>$<?php echo $amount;?></td>								
								</tr>
								<?php } ?> 
							</table></div></li>
							
						
						<li><p><b>Other Iteams</b></p></li>
						
						   <li><div class="summery_div">
							<table width="100%" style="background-color:#fff;">
							   <tr class="tr_class">
							        <td>Sl.No</td>
								    <td>Iteam name</td>
									<td>Iteam Price</td>																		
								</tr><?php 
						
						$othe_price=0;
						$b=1;
						while($rec_other=mysqli_fetch_array($query_other)){
							$othe_price=$othe_price+$rec_other['oprice'];	
							//$price=$price+$amount;?>
								<tr class="tr_normal">
								    <td><?php echo $b++;?></td>
								    <td><?php echo $rec_other['okey'];?></td>
									<td>$<?php echo $rec_other['oprice'];?></td>																	
								</tr>
								<?php }if($b<=1){?>
								<tr class="tr_normal">
								    <td>&nbsp;</td>
								    <td>No Iteam found</td>
									<td>&nbsp;</td>																	
								</tr>
								<?php } ?></table></li>
							
						<li style="border-top:1px dotted #ccc;"><p><b>Total Price -- <span style="float:right;">$<?php echo $price+$othe_price;?></span></b></p>
							</li>
						  </ul>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>


<?php
include_once('footer _main.php');
?>