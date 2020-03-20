<?php 
include_once('header.php');
include_once('top.php');
$maxDays=date('t');
$currentDay=date('j');
$day_nam=date('D',time());

if(isset($_POST['selected_day'])&&$_POST['selected_day']!='')
{

	$_SESSION["selected_day"] = $_POST['selected_day'];
	$_SESSION["day_name"] = $_POST['day_name'];  
    $_SESSION["selected_time"] = $_POST['selected_time'];  	
	 
	  echo "<script>window.location='enter_user_address.php'</script>";
}

$select_size="select * from `size` where `id`='".$_SESSION["size"]."'";
$size_query=mysqli_query($mysql_link,$select_size);
$size=mysqli_fetch_array($size_query);

$select_type="select * from `bracket_type` where `bracket_id`='".$_SESSION["type"]."'";
$type_query=mysqli_query($mysql_link,$select_type);
$type=mysqli_fetch_array($type_query);
$wall_price=$_SESSION["wall_price"];
?>
<style>
.select-time-day-selector-triangle_right {
    float: right;
    margin-right: 5%;
    margin-top: -49px;
}
</style>
<section class="comman_tb_padding">
<div id="root">
<input type="hidden" name="left" id="left" value="0">
<input type="hidden" name="right" id="right"  value="0">
<div class="app-container">
  <div class="container">
  <div class="row">
		<div class="col-sm-12">
			<div class="booking_header_comman">
				<h2>Pick an arrival time that suits you</h2>
			</div>
		</div>
		<div class="col-lg-7 col-md-12">
			<div class="content-container">
      
      <div class="select-time-wrapper" id="no-scorll-bar-time-select">
        <div>
          <div class="select-time-day-selector-container-desktop">
            <button class="select-time-day-selector-triangle"> <i class="fa fa-angle-left" aria-hidden="true"></i> </button>
            <div class="select-time-day-selector-box">
              <div class="select-time-day-selector-wrapper ">
                <?php
for($a=$currentDay;$a<=$maxDays;$a++){
if($a==$currentDay){
	$day_name=date('D',time());
?>
                <div class="select-time-day-item-wrapper">
                  <button class="select-time-day-item day-active" tabindex="-1" onclick="select_day('<?php echo $currentDay;?>','<?php echo $day_name;?>');">
                  <div class="select-time-weekday"> Today </div>
                  </button>
                </div>
                <?php 
}else{
	
	$diff=$a-$currentDay;
	
	$ne_day=date('D', strtotime('+ '.$diff.'day',time()));?>
                <div class="select-time-day-item-wrapper">
                  <button class="select-time-day-item " tabindex="-1" onclick="select_day('<?php echo $a;?>','<?php echo $ne_day;?>');">
                  <div class="">
                    <div class="select-time-weekday"> <?php echo $ne_day;?> </div>
                    <div class="select-time-day-in-number"> <?php echo $a;?></div>
                  </div>
                  </button>
                </div>
                <?php
}
} ?>
              </div>
            </div>
            <div class="select-time-day-selector-triangle"></div>
          </div>
          
          <button class="select-time-day-selector-triangle_right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
        <div class="select-time-time-picker-wrapper">
          <button class="time-content-box disabled" disabled="">
          <p>8am - 9am</p>
          </button>
          <button class="time-content-box time-content-box-active" onclick="select_time('9am - 10am');">
          <p>9am - 10am</p>
          </button>
          <button class="time-content-box " onclick="select_time('10am- 11am');">
          <p>10am - 11am</p>
          </button>
          <button class="time-content-box " onclick="select_time('11am - 12pm');">
          <p>11am - 12pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('12pm - 1pm');">
          <p>12pm - 1pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('1pm - 2pm');">
          <p>1pm - 2pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('2pm - 3pm');">
          <p>2pm - 3pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('3pm - 4pm');">
          <p>3pm - 4pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('4pm - 5pm');">
          <p>4pm - 5pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('5pm - 6pm');">
          <p>5pm - 6pm</p>
          </button>
          <button class="time-content-box " onclick="select_time('6pm - 7pm');">
          <p>6pm - 7pm</p>
          </button>
          <button class="time-content-box disabled" disabled="">
          <p>7pm - 8pm</p>
          </button>
          <button class="time-content-box disabled" disabled="">
          <p>8pm - 9pm</p>
          </button>
          <button class="time-content-box disabled" disabled="">
          <p>9pm - 10pm</p>
          </button>
        </div>
        <div id="time-height-spacer"></div>
        <div class="select-time-button-wrapper">
          <form name="frm7" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="hidden" name="selected_day" id="selected_day" value="<?php echo $currentDay;?>">
            <input type="hidden" name="day_name" id="day_name"  value="<?php echo $day_nam;?>">
            <input type="hidden" name="selected_time" id="selected_time" value="9am - 10am">
            <button type="submit" class="new-action-button" name="scontinue">Continue</button>
          </form>
        </div>
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
                  <div class="aggregate-service"> <span class="service-name"><?php echo $type['title'];?> </span> <span class="service-price"><b>$<?php echo $type['price'];?></b></span> </div>
                  <div class="aggregate-service"> <span class="service-name"><?php echo $_SESSION["wall_type"];?> </span> <span class="service-price"><b>$<?php echo $_SESSION["wall_price"];?></b></span> </div>
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
                <div style="border-top:1px dotted #ccc; padding:5px 0;"></div>
                <div class="services-aggregation-details-wrapper">
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
<script>

$( ".select-time-day-selector-triangle" ).click(function() {
	
	var left=$("#left").val();
	var s=1;
	var count = parseInt(left)+parseInt(1);
	$("#left").val(count);
	
	var dis=count*100;
	
	
     $(".select-time-day-selector-wrapper").animate({
"margin-left": dis+"px"
}, 1000 );
$("#right").val(0);
});
$( ".select-time-day-selector-triangle_right" ).click(function() {
	
	var right_val=$("#right").val();
	var x=1;
	var right = parseInt(right_val)+parseInt(x);
	$("#right").val(right);
	
	var right_len=right*100;
	//alert(right_len);
	
     $(".select-time-day-selector-wrapper").animate({
"margin-left": "-"+right_len+"px"
}, 1000 );
$("#left").val(0);
});
$('.select-time-day-item').click(function() {
	$('.select-time-day-item').removeClass('day-active');
	$(this).addClass('day-active');
	
});
$('.time-content-box').click(function() {
	$('.time-content-box').removeClass('time-content-box-active');
	$(this).addClass('time-content-box-active');
	
});
function select_day(day,name)
{
	$('#selected_day').val(day);
	$('#day_name').val(name);
}
function select_time(time)
{
	
	$('#selected_time').val(time);
	
}
</script>