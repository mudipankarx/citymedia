<?php 
include_once('header.php');
include_once('top.php');

if(isset($_POST['address'])&&$_POST['address']!='')
{

	$_SESSION["address"] = $_POST['address'];
	$_SESSION["address_instructions"] = $_POST['address_instructions'];  
     	
	
	 echo "<script>window.location='enter-user-details.php'</script>";
}
?>
<section class="comman_tb_padding">
<div id="root">
  <div class="app-container">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="booking_header_comman">
					<h2>Where shall we send your technician?</h2>
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<div class="content-container">
        <form name="frm8" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <div class="select-address-wrapper">
            <div class="select-address-content-wrapper--">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Address" types="address" type="text" id="address" name="address" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" value=""  required>
                </div>
                <span class="input-loader-container">
                <div class="circle-loader load-complete">
                  <div class="checkmark draw"></div>
                </div>
                </span></div>
              <div style="height: 10px;"></div>
              <div class="new-input-comp">
                <textarea name="address_instructions" type="text" placeholder="Add address instructions (optional)" id="address_instructions"></textarea>
                <span class="input-loader-container">
                <div class="circle-loader load-complete">
                  <div class="checkmark draw"></div>
                </div>
                </span></div>
              <div class="select-address-continue-button-wrapper">
                <button type="submit" class="new-action-button">Continue</button>
              </div>
            </div>
          </div>
        </form>
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
              <div class="my-cart-small-items-wrapper ">
                <div><span class="time-title">Location</span></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper ">
                <div><span class="time-title">Contact Details</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
			</div>
		</div>
      
      
      <!--<div class="mobile-cart-background"></div>
      <div class="mobile-cart-wrapper">
        <div class="completion-bar-wrapper">
          <div style="width: 87.5vw;"></div>
        </div>
        <div class="mobile-cart-top-content-wrapper ">
          <div class="services-and-prices">
            <div class="prices">
              <div><span>
                <div class="fade-on-mount normal-elemnt-active">
                  <div><span><b>$170.95 </b></span><span class="small-price-hour"><b>TV Mounting</b></span>
                    <div class="cart-open-mode-details">More details</div>
                  </div>
                </div>
                </span></div>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
</section>
<?php 
include_once('footer.php');
?>
