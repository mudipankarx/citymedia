<?php 
include_once('header.php');
$_SESSION["st"]=1;
$select_query="select * from `size`";
$size_list=mysqli_query($mysql_link,$select_query);
//print_r($_SESSION['data']);
?>
<section class="comman_tb_padding">
<div id="root">
  <div class="app-container">
    <div class="container">
      <div class="content-container">
        <div class="booking_header_comman">
            <h2>What size is your TV?</h2>
        </div>
        <div class="select-issue-wrapper">
          <form name="frm1" id="frm1" method="post" action="zip_code.php">
            <input type="hidden" name="size" id="size">
            <input type="hidden" name="price" id="price">
          </form>
          <?php 
$a=1;
while($list=mysqli_fetch_array($size_list)){
$b=$a;

?>
          <div>
            <div class="single-answer-component-wrapper">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content" onclick="submit_size('<?php echo $list['id'];?>','<?php echo $list['price'];?>');">
                <label><?php echo $list['name'];?><span class="price">+($<?php echo $list['price'];?>)</span></label>
                </button>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php
include_once('footer.php');
?>