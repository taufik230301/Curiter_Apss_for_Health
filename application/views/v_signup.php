<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
	<link rel="icon" href="<?php echo base_url(); ?>/assets/gopay.jpg">
<meta charset="utf-8">
<title><?= $title ?></title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
		}
		body{
			font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
			overflow: hidden;
		}
		.background{
			background-image:  url("<?php echo base_url(); ?>/Assets/bgLogin.png");

/*			background-color: white;*/
			background-size: cover;
			height: 100vh;
			display: flex;
		}
		.box{
			margin-top: 15vh;
			margin-left: 65%;
			font-weight: 300px;
		}
		.texth1{
			font-size: 45px;
			color: #ec4638;
			font-weight: 500;
		}
		.textp{
			font-size: 16px;
			color: #ec4638;
			font-weight: 300;
		}
		.texta{
			color: #ec4638;
			font-weight: 700;
		}
		.texta{
			color: #7f91a1;
			font-weight: 700;
		}
		.texta:hover{
			color: #ec4638;
		}
		.formlogin{
			background: transparent;
			color: #ec4638;
			box-sizing: border-box;
			display: flex;
			flex-direction: column;
			width: 250px;
		}
		input{
			margin: 20px 0;
			padding: 10px;
			background: transparent;
			border: none;
			outline: none;
			color: #7f91a1;
			font-weight: 500;
			font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
		}
		button{
			margin: 20px 0;
			padding: 10px;
			background-color: transparent;
			border: none;
			border: 2px solid #ec4638;
			color: #ec4638;
			border-radius: 20px;
			font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
			font-size: 16px;
		}
		button:hover{
			background: #ec4638;
			color: #fff;
			cursor: pointer;
		}
		.username, .password, .fullname, .email, .repassword{
			border-bottom: 1px solid #ec4638;
		}
	</style>
</head>

<body>
	<main>
		<div class="background">
			<div class="box">
				<h1 class="texth1">Daftar</h1>
				<form class="formlogin" method = 'post' action="<?= base_url('user/signup')?>">
					<input type="text" class="fullname" name="fullname" placeholder="Nama Lengkap" value="<?= set_value('fullname')?>">
					<?= form_error("fullname",'<small class= "text-danger pl-3">','</small>')?>
					<input type="text" class="email" name="email" placeholder="email@abc.com" value="<?= set_value('email')?>">
					<?= form_error("email",'<small class= "text-danger pl-3">','</small>')?>
					<input type="password" class="password" name="password" placeholder="Password" >
					<?= form_error("password",'<small class= "text-danger pl-3">','</small>')?>
					<input type="password" class="repassword" name="repassword" placeholder="Masukkan Ulang Password">
					<?= form_error("repassword",'<small class= "text-danger pl-3">','</small>')?>
					<button type="submit" value="Sign Up" class="button">Daftar</button>
				</form>
				<p class="textp">Have Account? <a href="<?= base_url('user/signin')?>" class="texta">Sign In</a></p>
			</div>
		</div>
	</main>
</body>
</html>
