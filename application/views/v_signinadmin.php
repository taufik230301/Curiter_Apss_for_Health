<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
	<link rel="icon" href="<?php echo base_url(); ?>/assets/gopay.jpg">
<meta charset="utf-8">
<!-- <title><?= $title ?></title> -->
<title> Curiter | Admin Sign In </title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
		}
		.bodyadm{
			font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
			overflow: hidden;
			background-image:  url("<?php echo base_url(); ?>/Assets/bgcuriter.png");
			background-repeat: no-repeat;
/*			background-color: white;*/
			background-size: cover;
		}
		/* .background{
			background-image:  ;
			background-repeat: no-repeat;
			background-color: white;
			background-size: cover;
			height: 100vh;
			display: flex;
		} */
		.box{
			margin-top: 20vh;
			margin-left: 65%;
			font-weight: 300px;
		}
/*		.text{
			margin-left: 10%;
			font-weight: 300px;
		}*/
/*		.box{
			margin-left: 40%;
		}*/
		.texth1{
			font-size: 45px;
			color: #477A98;
			font-weight: 500;
		}
		.textp{
			font-size: 16px;
			color: #477A98;
			font-weight: 300;
		}
		.texta{
			color: #477A98;
			font-weight: 700;
		}
		.texta{
			color: #7f91a1;
			font-weight: 700;
		}
		.texta:hover{
			color: #477A98;
		}
		.formlogin{
			background: transparent;
			color: #477A98;
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
			border: 2px solid #477A98;
			color: #477A98;
			border-radius: 20px;
			font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
			font-size: 16px;
		}
		button:hover{
			background: #477A98;
			color: #fff;
			cursor: pointer;
		}
		.email, .password{
			border-bottom: 1px solid #477A98;
		}
	</style>
</head>

<body class="bodyadm">
	<main>

		<div class="background">
			<div class="box">
				<h1 class="texth1">Admin Sign In</h1>
				<br>
				<?php if ($this->session->flashdata('flash')) : ?>
					<div class="row mt-3">
						<div class="col-md-6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('flash'); ?>
								<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button> -->
							</div>
						</div>
					</div>
					<?php endif; ?>
				<form class="formlogin" method = 'post' action='<?= base_url('admin/admin/login')?>'>
					<!-- email gue ganti jadi username disini buat admin -->
					<input type="text" class="email" name="username" placeholder="Admin Username" value="<?= set_value('username')?>">
					<?= form_error("username",'<small class= "text-danger pl-3">','</small>')?>
					<input type="password" class="password" name="password" placeholder="Password" >
					<?= form_error("password",'<small class= "text-danger pl-3">','</small>')?>
					<button type="submit" value="Sign In" class="button" >Sign In</button>
				</form>
			</div>
		</div>
	</main>
</body>
</html>
