<?php 
include_once('header.php');
if(isset($_SESSION["admin_id"])&&$_SESSION["admin_id"]!=''){
				header('Location: calendar.php');
} 

if(isset($_POST['login'])){
 
    // Validate username
    if(empty(trim($_POST["uname"]))){
        $username_err = "Please enter a username.";
    } 
    
    // Validate password
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["pass"])) < 5){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["pass"]);
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){
        
        $select="select * from `admin` where `uname`='".$_POST["uname"]."' and `pass`='".md5($_POST["pass"])."'";
        $query=mysqli_query($mysql_link,$select);
		$fetch=mysqli_fetch_array($query);
        $num=mysqli_num_rows($query);
		if($num>=1)
		{
			$_SESSION["uname"] =$_POST["uname"];
			$_SESSION["admin_id"] =$fetch["id"];
			header('Location: calendar.php');
		}else{
			$error_msg="<span style='color:red'>Wrong username/Password </span>";
		}
    }
    
    
}


?>
<style>
.inner_banner_content {
    display: none;
}
.btn_call_fixed {
    display: none;
}
.inner_banner_txt_sec {
    display: none;
}
.class_admin{
    border: 1px solid #ccc;
    width: 500px;
    background: #ccc;
    padding: 25px;
    border-radious: 10px;
    border-radius: 10px;
    text-align:center;
}
.admin_input{
    width: 350px;
    padding: 10px;
    border-radius: 3px;
    margin-top: 20px;

}
.admin_submit{
    width: 200px;
    height: 50px;
    border-radious: 79px;
    border-radius: 9px;
    color: #fff;
    background: #666;
}
</style>
<!-- inner_page_banner_sec -->

<section class="admin_login_sec comman_tb_padding bg_color_light_gray">
  <div class="container class_admin" >
  <div class="admin_login_box">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" name="frm1" method="POST">
              <div class="new-input-comp--">
                <h2>Admin Login</h2>
                <h5>
                  <?php if(isset($error_msg)&&$error_msg!=''){ echo $error_msg;}?>
                </h5>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input class="admin_input" type="text" id="uname" name="uname" placeholder="Enter your username" value="" required>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<input class="admin_input" type="password" id="pass" name="pass" placeholder="Enter your Password" value="" required>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							 <input class="admin_submit" type="Submit" id="submit" name="login" value="Login" class="admin_submit">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<div class="circle-loader load-complete win" style="display:none;">
                  <div class="checkmark draw"></div>
                </div>
						</div>
					</div>
				</div>
                
                 </div>
            </form>
  </div>
    <!--<div class="comman_content_style">
      <div class="row">
        <div class="zip-code-wrapper">
          <div class="zip-code-input-wrapper">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" name="frm1" method="POST">
              <div class="new-input-comp">
                <h2>Admin Login</h2>
                <h5>
                  <?php if(isset($error_msg)&&$error_msg!=''){ echo $error_msg;}?>
                </h5>
                <input type="text" id="uname" name="uname" placeholder="Enter your username" value="" required>
                <div style="clear:both; height:20px;"></div>
                <input type="password" id="pass" name="pass" placeholder="Enter your Password" value="" required>
                <div style="clear:both; height:20px;"></div>
                <input type="Submit" id="submit" name="login" value="Login">
                <span class="input-loader-container">
                <div class="circle-loader load-complete win" style="display:none;">
                  <div class="checkmark draw"></div>
                </div>
                </span> </div>
            </form>
          </div>
        </div>
      </div>
    </div>-->
  </div>
</section>
<?php 
include_once('footer _main.php');
?>