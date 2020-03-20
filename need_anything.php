<?php 
include_once('header.php');
include_once('top.php');

$select_size="select * from `size` where `id`='".$_SESSION["size"]."'";
$size_query=mysqli_query($mysql_link,$select_size);
$size=mysqli_fetch_array($size_query);

$select_type="select * from `bracket_type` where `bracket_id`='".$_SESSION["type"]."'";
$type_query=mysqli_query($mysql_link,$select_type);
$type=mysqli_fetch_array($type_query);
$wall_price=$_SESSION["wall_price"];
$wall_type=$_SESSION["wall_type"];
$spot=$_SESSION['spot'];
$i=1;
if(isset($_POST['another_tv'])&&$_POST['another_tv']!='')
{
	$_SESSION['old'][]=array();
	$text=array('size_name'=>$size['name'],'size_price'=>$size['price'],'bracket_type_title'=>$type['title'],'bracket_type_price'=>$type['price'],'spot'=>$_SESSION['spot'],'wall_type_title'=>$_SESSION["wall_type"],'wall_type_price'=>$wall_price);
	//$ss=$_SESSION['pp'][].','.$text;
	//print_r($ss);
	array_push($_SESSION['old'],$text);
    
    echo "<script>window.location='book.php'</script>";
	//session_destroy();


}
if(isset($_POST['cond'])&&$_POST['cond']!='')
{
	 $_SESSION['dip']=array();
	foreach($_POST['anything_name'] as $key=>$val)
	{
		$array=array('iteam_name'=>$val,'iteam_price'=>$_POST['anything_price'][$key]);
		array_push($_SESSION['dip'],$array);
		
	}
	//die;
	
	  echo "<script>window.location='select_time.php'</script>";
}
?>
<style>
.sel {
    background: blue;
}
</style>
<section class="comman_tb_padding">
<form method="post" name="frm5" id="frm5">
  <input type="hidden" name="another_tv" value="1">
</form>
<div id="root">
  <div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="booking_header_comman">
				<h2>Need anything else</h2>
			</div>
		</div>
		<div class="col-lg-7 col-md-12">
			<div class="content-container">
      <input type="hidden" name="c1" id="c1" value="0">
      <input type="hidden" name="c2" id="c2" value="0">
      <input type="hidden" name="c3" id="c3" value="0">
      
      <div class="question-comp-wrapper">
        <div class="multi-section-wrapper">
          <div class="multi-section-inner-wrapper">
            <button class="section-title" disabled="">The most popular</button>
            <div class="" >
              <div class="multi-selection-option" onclick=>
                <div class="selected-indicator">
                  <input disabled type="checkbox" name="opt1" id="opt1" value="Hide Powercord#160">
                  </input>
                </div>
                <button class="inner-wrapper" >
                <div class="img-wrapper"><img src="./images/1-sheetrock.png" style="width:48px; height:37px;"></div>
                <div class="text">Hide Powercord</div>
                <div class="price">+($160)</div>
                </button>
              </div>
              <div class="multi-selection-option">
                <div class="selected-indicator">
                  <input disabled type="checkbox" name="opt1" id="opt1" value="Sound bar#50" id="r1">
                  </input>
                </div>
                <button class="inner-wrapper">
                <div class="img-wrapper"> <img src="./images/2-SOUNDBAR.png" style="width:48px; height:37px;"></div>
                <div class="text">Sound Bar</div>
                <div class="price">+($50)</div>
                </button>
              </div>
              <div class="multi-selection-option">
                <div class="selected-indicator">
                  <input disabled type="checkbox" name="opt1" id="opt1" value="Wall shelf#50" id="r1">
                  </input>
                </div>
                <button class="inner-wrapper">
                <div class="img-wrapper"> <img src="./images/3- WALLSHELF.png" style="width:48px; height:37px;"> </div>
                <div class="text">Wall Shelf</div>
                <div class="price">+($50)</div>
                </button>
              </div>
              <div class="multi-selection-option">
                <div class="selected-indicator">
                  <input disabled type="checkbox" name="opt1" id="opt1" value="Fire Place#150" id="r1">
                  </input>
                </div>
                <button class="inner-wrapper">
                <div class="img-wrapper"> <img src="./images/4-FIREPLACE.png" style="width:48px; height:37px;"> </div>
                <div class="text">Fire Place</div>
                <div class="price">+($150)</div>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="multi-section-wrapper"><div class="multi-section-inner-wrapper"><button class="section-title">Devices<div class="close-button cb1"><img src="https://puls.com/create-appointment/static/media/close.adf519bd.svg"></div></button><div class="selections-wrapper cb11"><div class="multi-selection-option"><div class="selected-indicator"><span class="not-selected"><input type="checkbox" name="rGroup" id="rGroup" value="1" id="r1"></input></span></div><button class="inner-wrapper"><div class="img-wrapper"><img src="https://puls.com/create-appointment/images/tv-mounting/upsells/speakers-up-to-3.svg"></div><div class="text">Install surround system - up to 3 speakers</div><div class="price">+($59)</div></button></div><div class="multi-selection-option"><div class="selected-indicator"><span class="not-selected"></span></div><button class="inner-wrapper"><div class="img-wrapper"><img src="https://puls.com/create-appointment/images/tv-mounting/upsells/speakers-more-than-3.svg"></div><div class="text">Install surround system - more than 3 speakers</div><div class="price">+($99)</div></button></div></div></div></div>--> 
        
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
                  <form name="frm14" id="frm14" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="cond" value="1">
                    <p id="optx"> </p>
                  </form>
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

$tot=$total+$size['price']+$type['price']+$wall_price;?>
                <div class="subtotal-container"> <span>Total</span>
                  <input type="hidden" name="total" id="sum_total" value="<?php echo $tot;?>">
                  <span class="my-cart-small-text-bold" id="ext_tot"> $<?php echo $tot;?></span> </div>
                <div class="disclaimer-container"> </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div id="myModal2" class="modal fade" role="dialog" >
        <div class="add-to-cart-wrapper" style="text-align: center;">
          <h2>TV Added</h2>
          <p>You have added a TV to your cart.<br>
            You can now add another TV,<br>
            or continue to booking.</p>
          <button  onclick="another_tv();" name="another_tv" class="new-action-button new-action-button-negative new-action-button-blocklevel">+ Add another TV</button>
          <button class="new-action-button new-action-button-blocklevel" onclick="continue_next();">Continue</button>
        </div>
      </div>
    </div>
		</div>
		
		<div class="col-sm-12">
			<div class="question-action-button-wrapper ">
          <button class="new-action-button new-action-button-blocklevel new-action-button-disable-top-on-valid" id="skip" data-toggle="modal" data-target="#myModal2">Skip</button>
        </div>
		</div>
	</div>
    
    
  </div>
</div>
<div style="clear:both;"></div>
</section>
<?php 
include_once('footer.php');
?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script>
var a=1;
$(".multi-selection-option").click(function () {
	

    if ($(this).find('input:checkbox[name=opt1]').is(":checked")) {
		var sum_tot=$('#sum_total').val();
		var len=$(":checkbox:checked").length;
		if(len<=1){		
		   $('#skip').text('Skip');
		}
           var va= $(this).find('input:checkbox[name=opt1]').val();
		   var splid=va.split("#");
        $(this).find('input:checkbox[name=opt1]').prop("checked", false);
		$("#"+splid[1]).remove();
		var new_sum_tot=parseInt(sum_tot)-parseInt(splid[1]);
		$('#sum_total').val(new_sum_tot);
		$('#ext_tot').text(new_sum_tot);
		
    } else { 
	
	    var sum_tot=$('#sum_total').val();
		$('#skip').text('Continue');
        $(this).find('input:checkbox[name=opt1]').prop("checked", true);
		var va= $(this).find('input:checkbox[name=opt1]').val();
		var splid=va.split("#");
		var div='<div id="'+splid[1]+'" class="aggregate-service"><input type="hidden" name="anything_name[]" value="'+splid[0]+'"><input type="hidden" name="anything_price[]" value="'+splid[1]+'"><span class="service-name">'+splid[0]+'</span><span class="service-price"><b>$'+splid[1]+'</b></span></div>';
		//alert(div);
       $( "#optx" ).append(div);
	    var new_sum_tot=parseInt(sum_tot)+parseInt(splid[1]);
		//alert(new_sum_tot);
		$('#sum_total').val(new_sum_tot);
		$('#ext_tot').text(new_sum_tot);
	  
    }


    //alert($(this).find('input:checkbox[name=markerType]').is(":checked"));
});

</script> 
