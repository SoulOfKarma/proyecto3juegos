<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login de Usuario</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://localhost/BLUEGEMGAMES/fotos/style.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#body {
	margin: 0 15px 0 15px;
}

p.footer {
	text-align: right;
	font-size: 11px;
	border-top: 1px solid #D0D0D0;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

#btnLog
{
}

	</style>
</head>
<body>
<div id="container" name="loginfond" style=" background-image: url('http://localhost/BLUEGEMGAMES/fotos/black.jpg') ;">

	<h1 id="tlogin"><font color=white>Login de Usuarios</font></h1>

	<div id="body">
		<div class="container" >
          <div class="row">
            <div class="col-md-2">

			</div>
			<div class="col-md-8" style=" background-image: url('http://localhost/BLUEGEMGAMES/fotos/black.jpg') ;">
			
				<form action="<?= base_url() ?>index.php/Login/Logearse" method="post">
			    <label for="log"><font color=white><i class="fas fa-address-card"></i> User: </font></label>
				<input type="text" id="user" name="user" class="form-control" required="required"><br><br>
				<label for="log"><font color=white><i class="fas fa-handshake"></i> Pass: </font></label>
				<input type="password" id="pass" name="pass" class="form-control" required="required"><br><br>
				<input type="submit" value="Ingresar" class="btn btn-success" id="ir">
				</form>
				<br><br>
				
			</div>
			<div class="col-md-2">
			
			</div>
		  </div>
		</div>
	</div>

	
</div>

</body>
</html>