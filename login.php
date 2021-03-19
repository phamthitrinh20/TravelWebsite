<?php
ob_start();
include "layouts/header.php";
include "services/contactRegister.php";
include "services/contactLogin.php";
onRegisterUser();
onLoginUser();
ob_end_flush();
?>
<div class="hero" style="background-image: url(assets/images/img_bg_4.jpg);">
	<div class="form-box">
		<div class="button-box">
			<div id="btn"></div>
			<button type="button" class="toggle-btn" onclick="login()">
				Log In
			</button>
			<button type="button" class="toggle-btn" onclick="register()">
				Register
			</button>
		</div>
		<div class="social-icons">
			<a href="#"><i class="icon-twitter icon-custom"></i></a>
			<a href="#"><i class="icon-facebook icon-custom"></i></a>
			<a href="#"><i class="icon-linkedin icon-custom"></i></a>
		</div>
		<form class="input-group" id="login" method='POST'>
			<input
				type="text"
				class="input-field"
				placeholder="Tên đăng nhập"
				requierd
				name='nameLogin'
				value = '<?php echo $nameLogin; ?>'
			/>
			<input
				type="password"
				class="input-field"
				placeholder="Mật khẩu"
				requierd
				name='passLogin'
				value = '<?php echo $passLogin; ?>'
			/>
			<input type="checkbox" class="check-box" name='checkLogin[]'/> <span>Nhớ mật khẩu</span>
			<button type="submit" class="submit-btn" name='btnLogin'>Đăng nhập</button>
			<p class="text-warning">
				<?php echo $errorLogin; ?>
			</p>
		</form>
		<form class="input-group" id="register" method='POST'>
			<input
				type="text"
				class="input-field"
				placeholder="Tên đăng nhập"
				requierd
				name = 'nameRegis'
				value='<?php echo $nameRegis ?>'
			/>
			<input
				type="password"
				class="input-field"
				placeholder="Mật khẩu"
				requierd
				name = 'passRegis'
				value='<?php echo $passRegis ?>'
			/>
			<input
				type="password"
				class="input-field"
				placeholder="Nhập lại Mật khẩu"
				requierd
				name = 'passRegisRepeat'
				value='<?php echo $passRegisRepeat ?>'
			/>
			<input type="checkbox" class="check-box" name='checkRegister[]' value='Ok' requierd/>
			<span class='ruleField'>Đồng ý các điều khoản và dịch vụ</span>
			<button type="submit" class="submit-btn" name='submit-register'>Đăng ký</button>
			<p class="text-warning">
				<?php echo $errorRegister; ?>
			</p>
		</form>
	</div>
</div>
<?php
include "layouts/footer.php"
?>