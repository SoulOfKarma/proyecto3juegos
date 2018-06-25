<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login de Usuario</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost/BLUEGEMGAMES/fotos/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

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

	div.round3 {
    border: 2px solid #252525;
    border-radius: 12px;
}

	</style>
</head>
<body>
<div id="container">

<nav class="navbar navbar-light bg-light justify-content-between">
<a class="navbar-brand">Bienvenido : <?php echo $_SESSION['user']?></a>
<form class="form-inline">
<a class="btn btn-light" href="<?= base_url() ?>index.php/Cliente/Index">Inicio</a>
<a class="btn btn-light" href="<?= base_url() ?>index.php/Cliente/productoCliente">Producto</a>
<a class="btn btn-light" href="<?= base_url() ?>index.php/Cliente/Carrito">Carrito</a>
<a class="btn btn-light" href="<?= base_url() ?>index.php/Cliente/ProductoVendido">Listado Compras Realizadas</a>
<a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/Logout">Logout</a>
<a class="btn btn-light" href="<?= base_url() ?>index.php/Cliente/Carrito"><i class="fas fa-archive"></i> Productos en Carrito: <?php echo $contador ?></a>
</form>
</nav>
</div>
<div class="container">
 <div class="row">
  <div class="col-md-0">
  </div>
  <div class="col-md-12 round3" id="color" style=" background-image: url('http://localhost/BLUEGEMGAMES/fotos/black.jpg') ;">
   <div class='carrusel_productos'>
    <div class='titulo_carrousel'>
    
    </div>
	<h2><a class='ArrowHome' href='<?= base_url() ?>index.php/Cliente/productoCliente'><label name="title" id="title" style='color:white; font-size:50px font-family:ACID LABEL__' > Recien Agregados</p> </a>
  </h2>
  <div id="owl-demo1" class="owl-carousel owl-theme galeria">
  <?php foreach($arrJuego as $juego) { ?>
   <div class="item" style="width:150px"> 
	<a href="#" onclick="enviar(<?php echo $juego->idjuego ?>)">
	<input type="hidden" name="idjuego" id="idjuego" value="<?php echo $juego->idjuego?>">
     <img src="<?= base_url() ?>fotos/thumbs/<?php echo $juego->linkfoto?>" alt="" />
     <font color=white><p style:'color:white;'><?php echo $juego->nombrejuego?></p></font>
    </a>
  <div class='precios'>
   <div class='precio_web'>
    <div class='precio_monto'>
     <p class='btn-fn-agregar'>
      <span style='color:red ; font-size : 14px ;'>
      $ <b><?php echo $juego->precioInternet?></b> (Internet)
      </span>
     </p>
     <p style='color:white; font-size:14px;'>
     $ <b style='font-size : 14px '><?php echo $juego->precioNormal?></b >
      <span > (Normal)</span>
     </p>
     <div class='relleno'>
     </div>
    </div>
   </div>
  </div>
</div>
<?php } ?>


 </div>

  <div class="col-md-0">
  
  
  </div>
  <div class="container">
 <div class="row">
  <div class="col-md-0">
  </div>
  <div class="col-md-12" id="color" style="background-color:white opacity:1;">
   <div class='carrusel_productos'>
    <div class='titulo_carrousel'>
    
    </div>
	<h2><a class='ArrowHome' href='<?= base_url() ?>index.php/Cliente/productoCliente'><label name="title" id="title" style='color:white; font-size:50px font-family:ACID LABEL__' > General</p></a>
  </h2>
  <div id="owl-demo1" class="owl-carousel owl-theme galeria">
  <?php foreach($arrJuego as $juego) { ?>
   <div class="item" style="width:150px"> 
   <input type="hidden" name="idjuego" id="idjuego" value="<?php echo $juego->idjuego?>">
    <a href="#" onclick="enviar(<?php echo $juego->idjuego ?>)">
     <img src="<?= base_url() ?>fotos/thumbs/<?php echo $juego->linkfoto?>" alt="" />
     <font color=white><p style:'color:white;'><?php echo $juego->nombrejuego?></p></font>
    </a>
  <div class='precios'>
   <div class='precio_web'>
    <div class='precio_monto'>
     <p class='btn-fn-agregar'>
      <span style='color:red; font-size : 14px;'>
      $ <b><?php echo $juego->precioInternet?></b> (Internet)
      </span>
     </p>
     <p style='color:white; font-size:14px;'>
     $ <b style='font-size : 14px '><?php echo $juego->precioNormal?></b >
      <span > (Normal)</span>
     </p>
     <div class='relleno'>
     </div>
    </div>
   </div>
  </div>
</div>
<?php } ?>


 </div>

  <div class="col-md-0">
  
  
  </div>
</body>

<script type="text/javascript"> 
$(document).ready(function(){
  $(".owl-carousel").owlCarousel(
{
    items:3,
    autoplay:true,
    loop:true,
    margin:10,
    responsiveClass:true
    
}
  );
  
});
function enviar(id) 
{ 
	
	var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = "<?= base_url() ?>index.php/Cliente/productoEspecifico";
    
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'idjuego';
        input.value = id;
	
        form.appendChild(input);

    form.submit();
} 
</script>

</html>