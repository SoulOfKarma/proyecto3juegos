<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login de Usuario</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost/BLUEGEMGAMES/fotos/style.css"/>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>Owl/owl.carousel.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>Owl/owl.theme.default.min.css"/>
<script src="<?= base_url() ?>Owl/jquery.min.js"></script>
<script src="<?= base_url() ?>Owl/owl.carousel.min.js"></script>
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

<div class="container">
 <div class="row">
  <div class="col-md-12" style="background-color: grey;">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre Juego</th>
      <th scope="col">Precio Normal</th>
	  <th scope="col">Precio Internet</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($arrJuego as $juego) { ?>
    <tr>
      <th scope="row" class="bg-light"><?php echo $juego->idjuego ?></th>
      <td class="bg-light"><img src="<?= base_url() ?>fotos/thumbs/<?php echo $juego->linkfoto?>" alt="" /></td>
      <td class="bg-light"><?php echo $juego->nombrejuego ?></td>
      <td class="bg-light"><?php echo $juego->precioNormal ?></td>
	  <td class="bg-light"><?php echo $juego->precioInternet ?></td>
	  <?php } ?>
    </tr>
    
  </tbody>
</table>
  </div>
 </div>
</div>


 
</body>

</html>