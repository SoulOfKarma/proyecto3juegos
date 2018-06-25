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
		<div class="col-md-12">
		<td class="bg-light"></td>
		<table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo Juego</th>
      <th scope="col">Nombre Juego</th>
      <th scope="col">Precio Juego</th>
	  <th scope="col">Nombre Cliente</th>
	  <th scope="col">Eliminar?</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($arrJuego as $juego) { ?>
    <tr>
	  <th scope="row" style=" background-color:#252525 ; "><?php echo $juego->idcartemp ?></th>
      <td style=" background-color:#252525 ; "><?php echo $juego->nombre_juego ?></td>
      <td style=" background-color:#252525 ; ">$<?php echo $juego->precio ?></td>
	  <td style=" background-color:#252525 ; "><?php echo $juego->user ?></td>
	  
	  <td style=" background-color:#252525 ; "><input type="submit" value="Eliminar" class="form-control btn-danger"  onclick="eliminar(<?php echo $juego->idcartemp ?>)"></td>
	  <?php } ?>
    </tr>
    
  </tbody>
</table>
<?php foreach($codven as $cod) { ?>
<input type="submit" class="form-control btn-info" value="Procesar Venta" onclick="pagar('<?php echo $cod->codigoventa ?>')">
<?php } ?>
		</div>
		<div class="col-md-0">
			
		</div>
	</div>
</div>

</body>
<script type="text/javascript"> 

function eliminar(id) 
{ 
	
	var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = "<?= base_url() ?>index.php/Cliente/eliminarCarritoTemp";
    
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;
	
        form.appendChild(input);

    form.submit();
} 
function pagar(id) 
{ 
	
	var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = "<?= base_url() ?>index.php/Cliente/insertarVenta";
    
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;
	
        form.appendChild(input);

    form.submit();
} 
</script>

</html>