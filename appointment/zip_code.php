<?php 
include_once('header.php');

if(isset($_POST['size'])){
$_SESSION["size"] = $_POST['size'];
$_SESSION["price"] = $_POST['price'];
}

?>
<section class="comman_tb_padding zip_code_page">
<div id="root">
  <div class="app-container">
    <div class="container">
      <div class="content-container">
       
			<div class="booking_header_comman">
				<h2>Find a City Wide Media technician in your area</h2>
			</div>
          
        
        <div class="zip-code-wrapper">
          <div class="zip-code-input-wrapper">
            <div class="new-input-comp">
              <input type="tel" id="zipcode-input-item" placeholder="Enter your zip code" value="">
              <span class="input-loader-container">
              <div class="circle-loader load-complete win" style="display:none;">
                <div class="checkmark draw"></div>
              </div>
              </span> </div>
          </div>
          <form name="frm2" method="post" action="type.php">
            <input type="hidden" name="size" id="size" value="<?php echo $_POST['size'];?>">
            <button class="new-action-button win1" style="display:none;" confetti="true">Continue</button>
          </form>
		  
          <div class="confetti-wrapper">
            <div style="position: relative;"></div>
          </div>
          <div class="fade-on-mount normal-elemnt-active win" style="display:none;">
            <div class="facebook-social-sontent"> <span class="facebook-badge">4.5 <img src="images/star.7a1a7eae.svg"></span> on Facebook<br>
              for City Wide Media technicians in</span> <span class="city_found"></span> area<br>
              <span class="light-text">3.6 stars for other technicians in </span><span class="city_found"></span> </div>
          </div>
        </div>
      </div>
      <!--<div>
        <div class="my-cart-desktop">
          <div class="my-cart-wrapper-not-fixed my-cart-wrapper-closed"></div>
          <div class="my-cart-wrapper my-cart-wrapper-overflow my-cart-wrapper-closed">
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper my-cart-small-items-wrapper-colored">
                <div class="title-container"> <span class="time-title">TV Mounting</span></div>
                <div class="services-aggregation-details-wrapper">
                  <h3><b>32" - 60"</b></h3>
                  <div class="services-aggregation-details"></div>
                </div>
                <div class="my-cart-small-total-price">
                  <div> <span>Total</span> <span style="float: right;"><b>$0.00</b></span> </div>
                </div>
                <div class="disclaimer-container"></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper ">
                <div> <span class="time-title">Requested Time</span></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper ">
                <div><span class="time-title">Location</span></div>
              </div>
            </div>
            <div class="my-cart-small-items-container">
              <div class="my-cart-small-items-wrapper ">
                <div> <span class="time-title">Contact Details</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <div class="mobile-cart-background"></div>
      <div class="mobile-cart-wrapper hide-mobile-cart">
        <div class="completion-bar-wrapper">
          <div style="width: 0vw;"></div>
        </div>
        <div class="mobile-cart-top-content-wrapper " style="display:none;">
          <div class="fade-on-mount normal-elemnt-active">
            <div>
              <div>TV Mounting</div>
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
