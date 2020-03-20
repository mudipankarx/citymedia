<?php 
include_once('header_main.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/calendar.css">
<style>
.btn_call_fixed {
    display: none;
}
.inner_banner_content {
    display: none;
}
</style>
<section class="inner_page_banner_sec parallax_effect-" style="background-image:url('images/inner_banner_about.jpg');">

<div class="container">
  <div class="row">
    <div class="col-sm-12" style="position:relative;">
      <div class="inner_banner_content">
        <h1>Calendar</h1>
      </div>
    </div>
  </div>
</div>
</section>
<section class="calendar_page comman_tb_padding">
  <div class="container">
  <div class="calendar_area_inner">
    <div class="page-header">
      <div class="pull-right form-inline">
        <div class="btn-group">
          <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
          <button class="btn btn-default" data-calendar-nav="today">Today</button>
          <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
        </div>
        <!--<div class="btn-group" style="margin-left:20px;">
	<button class="btn btn-warning" data-calendar-view="year">Year</button>
	<button class="btn btn-warning active" data-calendar-view="month">Month</button>
	<button class="btn btn-warning" data-calendar-view="week">Week</button>
	<button class="btn btn-warning" data-calendar-view="day">Day</button>
	</div>--> 
      </div>
      <h3></h3>
      <!--<small>To see example with events navigate to Februray 2018</small>--> 
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="showEventCalendar"></div>
      </div>
      <!--<div class="col-md-3">
	<h4>All Events List</h4>
	<ul id="eventlist" class="nav nav-list"></ul>
	</div>--> 
    </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script> 
<script type="text/javascript" src="js/calendar.js"></script> 
<script>

(function($) {
"use strict";
var options = {
events_source: 'event.php',
view: 'month',
tmpl_path: 'tmpls/',
tmpl_cache: false,
day: '<?php echo date("Y-m-d");?>',
onAfterEventsLoad: function(events) {
if(!events) {
return;
}
var list = $('#eventlist');
list.html('');
$.each(events, function(key, val) {
$(document.createElement('li'))
.html('' + val.title + '')
.appendTo(list);
});
},
onAfterViewLoad: function(view) {
$('.page-header h3').text(this.getTitle());
$('.btn-group button').removeClass('active');
$('button[data-calendar-view="' + view + '"]').addClass('active');
},
classes: {
months: {
general: 'label'
}
}
};
var calendar = $('#showEventCalendar').calendar(options);
$('.btn-group button[data-calendar-nav]').each(function() {
var $this = $(this);
$this.click(function() {
calendar.navigate($this.data('calendar-nav'));
});
});
$('.btn-group button[data-calendar-view]').each(function() {
var $this = $(this);
$this.click(function() {
calendar.view($this.data('calendar-view'));
});
});
$('#first_day').change(function(){
var value = $(this).val();
value = value.length ? parseInt(value) : null;
calendar.setOptions({first_day: value});
calendar.view();
});
$('#language').change(function(){
calendar.setLanguage($(this).val());
calendar.view();
});
$('#events-in-modal').change(function(){
var val = $(this).is(':checked') ? $(this).val() : null;
calendar.setOptions({modal: val});
});
$('#format-12-hours').change(function(){
var val = $(this).is(':checked') ? true : false;
calendar.setOptions({format12: val});
calendar.view();
});
$('#show_wbn').change(function(){
var val = $(this).is(':checked') ? true : false;
calendar.setOptions({display_week_numbers: val});
calendar.view();
});
$('#show_wb').change(function(){
var val = $(this).is(':checked') ? true : false;
calendar.setOptions({weekbox: val});
calendar.view();
});
}(jQuery));
</script>
<?php
include_once('footer _main.php');
?>
