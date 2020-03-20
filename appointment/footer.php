<!-- footer_sec -->
<section class="footer_sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="footer_box">
          <h2 class="ft_heading"><img src="images/footer_logo.png" alt="" /></h2>
          <div class="ft_contact_Desc">
            <p>We specialize in designing and installing audio/video and home theater systems for any room and any budget.</p>
            <ul class="footer_social">
              <li><a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="footer_box ft_box2">
          <h2 class="ft_heading">Quick <span class="txt_color_yellow">Links</span></h2>
          <div class="ft_links">
            <ul class="">
              <li><a href="index.php">Home</a></li>
              <li><a href="about-us.php">About Us</a></li>             
              <li><a href="testimonials.php">Testimonial</a></li>
              <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="footer_box ">
          <h2 class="ft_heading">Contact With <span class="txt_color_yellow">Us</span></h2>
          <div class="ft_contact">
            <ul class="">
              <li>
                <div class="ft_icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                <p>Lorem ipsum dolor sit amet, <br>
                  consectetur adipiscing elit, sed</p>
              </li>
              <li>
                <div class="ft_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                <p><a href="tel:2155501291">215-550-1291</a></p>
              </li>
              <li>
                <div class="ft_icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                <p><a href="mailto:admin@tvtrap.com">admin@tvtrap.com</a></p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- footer_copyright_sec -->
<section class="footer_copyright_sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="footer_copy">
          <p>City wide media© All right reserved 2020</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- top_to_scroll --> 
<a href="javascript:void(0)" id="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a> 

<!-- modal -->
<div class="call_button_fixed circle">
  <button type="button" class="btn_call_fixed" data-toggle="modal" data-target="#call_modal"> <i class="fa fa-phone" aria-hidden="true"></i> </button>
</div>

<!-- The Modal -->
<div class="modal" id="call_modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span class="pe-7s-close" ></span></button>
        <h3>Leave your phone number <br>
          and we will call you back</h3>
        <form class="booking_modal_form">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group"> 
                <!--<label>Name <small>*</small></label>-->
                <input type="text" class="form-control" placeholder="Name">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone No.">
              </div>
            </div>
            <div class="col-sm-12 text-center">
              <div class="form-group">
                <button type="button" class="btn btn_f_submit button_effect_aylen">Send Your Message</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <!-- Modal footer --> 
      
    </div>
  </div>
</div>

<!-- fixed_book_btn -->
  <div class="label fixed_book_btn">
    <div class="content"><a href="book.php">Book Now</a></div>
  </div>
<!-- jQuery Area --> 
 <script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/owl.carousel.js"></script> 
<script src="js/stellarnav.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>		


<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script>
function submit_size(id)
{
	$('#size').val(id);
	$( "#frm1" ).submit();
}

$("#zipcode-input-item").keyup(function(){
	var zip=$('#zipcode-input-item').val();
	//alert(zip);
	$.ajax('ajax.php', {
		type: 'POST',  // http method
		data: { zip: zip },  // data to submit
		success: function (data, status, xhr) {
			var result = data.split('_');
			//alert(result);
			if(result[1]==1){
			  $('.win').show();
			  $('.win1').show();
                          $('.city_found').html(result[0]);
			  $('.win1').prop('disabled', false);
			}else{
			  $('.win').hide();
			  $('.city_found').html('');	
			  $('.win1').prop('disabled', true);
			}
		},
		error: function (jqXhr, textStatus, errorMessage) {
				$('p').append('Error' + errorMessage);
		}
	});
});
</script>
<script>
function submit_size(id,price)
{
	$('#size').val(id);
	$('#price').val(price);
	$( "#frm1" ).submit();
}
function submit_type(type,price)
{
	//alert(price);
	$('#type').val(type);
	$('#bracket_price').val(price);
	$( "#frm2" ).submit();
}
function submit_spot(spot)
{
	//alert(price);
	$('#spot').val(spot);	
	$( "#frm3" ).submit();
}
function submit_wall(wall,price)
{
	//
	//var type_of_wall=$('#type_of_wall').val();
	//alert(type_of_wall);
	$('#wall').val(wall);
	$('#wall_price').val(price);	
	$( "#frm4" ).submit();
}
function other()
{
	
	$('.modal-opend').show();

}function enable_next()
{
	$('.new-action-button-blocklevel').prop('disabled', false);
}
$( ".cb1" ).click(function() {
	var c1=$('#c1').val();	
	if(c1==0){
        $( ".cb11" ).addClass("section-open");
		$('#c1').val(1);
	}else{
		$( ".cb11" ).removeClass("section-open");
		$('#c1').val(0);
	}
  
});
$( ".cb2" ).click(function() {
	var c2=$('#c2').val();
    if(c2==0){
        $( ".cb22" ).addClass("section-open");
		$('#c2').val(1);
	}else{
		$( ".cb22" ).removeClass("section-open");
		$('#c2').val(0);
	}
});
$( ".cb3" ).click(function() {
	var c3=$('#c3').val();
    if(c3==0){
        $( ".cb33" ).addClass("section-open");
		$('#c3').val(1);
	}else{
		$( ".cb33" ).removeClass("section-open");
		$('#c3').val(0);
	}
});
function another_tv()
{
	$( "#frm5" ).submit();
}
function continue_next()
{
	//alert('test');
	$( "#frm14" ).submit();
	
}

</script>
</body>
</html>