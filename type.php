<?php 
include_once('header.php');
include_once('top.php');
$select_query="select * from `bracket_type`";
$type_list=mysqli_query($mysql_link,$select_query);

$select_query2="select * from `size` where `id`='".$_SESSION["size"]."'";
$size_list2=mysqli_query($mysql_link,$select_query2);
$size=mysqli_fetch_array($size_list2);


if(isset($_POST['type'])&&$_POST['type']!='')
{
	$_SESSION["type"] = $_POST['type'];
    $_SESSION["bracket_price"] = $_POST['bracket_price'];
	 echo "<script>window.location='spot.php'</script>";
}

?>
<section class="comman_tb_padding">
  <div id="root" >
    <div class="app-container">
      <form name="frm2" id="frm2" method="post" action="">
        <input type="hidden" name="type" id="type">
        <input type="hidden" name="bracket_price" id="bracket_price">
      </form>
      <div class="container">
	  <div class="row">
	  <div class="col-sm-12">
		<div class="booking_header_comman">
				<h2>Select Bracket Type</h2>
			</div>
	  </div>
		<div class="col-lg-7 col-md-12">
			<div class="content-container">
			
			
			
          <div class="question-comp-wrapper">
            <?php 
$a=1;
while($list=mysqli_fetch_array($type_list)){
$b=$a;?>
            <div>
              <div class="single-answer-component-wrapper">
                <div class="fade-on-mount normal-elemnt-active">
                  <button onclick="submit_type('<?php echo $list['bracket_id'];?>','<?php echo $list['price'];?>');" class="answer-content with-image">
                  <label><?php echo $list['title'];?>
                    <?php if($list['price']!=0){?>
                    <span class="price">+($<?php echo $list['price'];?>)</span><span class="price-with-line">$<?php echo $list['gross_price'];?></span>
                    <?php } if($list['price']!=0){?>
                    <span class="discount-icon-badge"><img src="images/discount-icon-blue.a6312632.svg"><span>50% off</span></span>
                    <?php } ?>
                  </label>
                  <?php if($list['price']!=0){?>
                  <img class="img-single" src="images/bracket_fixed.svg">
                  <?php } ?>
                  </button>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
		</div>
		<div class="col-lg-5 col-md-12">
			<div>
          <div class="my-cart-desktop">
            <div class="my-cart-wrapper-not-fixed "></div>
            <div class="my-cart-wrapper ">
              <div class="my-cart-content-wrapper">
                <div class="my-cart-device-section-wrapper">
                  <div class="my-cart-device-section-header">
                    <div class="my-cart-device-section-header-image-title">
                      <div> <span>TV Mounting</span> </div>
                    </div>
                  </div>
                  <div class="services-aggregation-details-wrapper">
                    <h3><b><?php echo $size['name'];?></b></h3>
                    <div class="services-aggregation-details">
                      <div class="aggregate-service"> <span class="service-name">TV Mounting </span> <span class="service-price"><b>$<?php echo $size['price'];?></b></span> </div>
                    </div>
                  </div>
                  <div class="services-aggregation-details-wrapper">
                    <?php 
$total=0;
$a=1;
$price1=0;
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


$tot=$total+$size['price'];?>
                    <div class="subtotal-container"> <span>Total</span> <span class="my-cart-small-text-bold"> $<?php echo $tot;?></span> </div>
                    <div class="disclaimer-container"> </div>
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
  </div>
</section>
<?php
include_once('footer.php');
?>
