<?phpdefined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Pwf Tubes</title>
	<link rel='stylesheet' href="https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/login.css');?>"/>
	<style>
	body {
	  display: flex;
	  justify-content: center;
	  align-items: center;
	  min-height: 100vh;
	  background: url(<?=base_url('assets/p.jpg');?>); 
	  background-repeat: no-repeat; 
	  background-size: cover;
	</style>
</head>
<body >
	<?=$this->session->flashdata('msg')?>
	<div style="color: red;"><?=validation_errors()?></div>
	<!-- partial:index.partial.html -->
		<form action="<?=site_url('auth/login')?>" class="login-form"  method="post">
			<h1>Login</h1>
			<div class="form-input-material">
			<input type="text" name="username" id="username" placeholder=" " autocomplete="off" class="form-control-material" required />
			<label for="username">Username</label>
		  </div>
		  <div class="form-input-material">
			<input type="password" name="password" id="password"  placeholder=" " autocomplete="off" class="form-control-material" required />
			<label for="password">Password</label>
		  </div>
		  <div>
			<input type="checkbox" onclick="show()"> Show Password
		  </div>
		  <input type="submit" name="login" class="btn btn-primary btn-ghost" role="button" value="Login">
		</form>
		<!-- partial -->
		<script>
	function show() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	</script>
</body>
</html>

