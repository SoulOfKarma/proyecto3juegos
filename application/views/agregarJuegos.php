<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login de Usuario</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://localhost/BLUEGEMGAMES/fotos/style.css"/>

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
  <a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/Index">Inicio</a>
  <a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/CrudG">Menu Genero</a>
  <a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/CrudE">Menu Empresa</a>
  <a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/CrudP">Menu Plataformas</a>
	<a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/AgregarJuego">Agregar Juego Nuevo</a>
    <a class="btn btn-light" href="<?= base_url() ?>index.php/Admin/Logout">Logout</a>

  </form>
</nav>
</div>
<div class="container">
 <div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
  
  <?=@$error?>
  <div id="formulario_imagenes" class="form-control" style="background-color:#252525;">
      <span><?php echo validation_errors(); ?></span>
 
  <form action="<?php echo base_url();?>index.php/Admin/do_upload" method="post" enctype="multipart/form-data" >
      <label style='color:white; font-size:14px;'>Nombre Juego:</label><input type="text" name="titulo" id="titulo" class="form-control"/><br><br>
      <label style='color:white; font-size:14px;'>Precio Normal(Tienda):</label><input type="text" name="precion" class="form-control"/><br><br>
      <label style='color:white; font-size:14px;'>Precio Internet:</label><input type="text" name="precioi" class="form-control"/><br><br>
      <label style='color:white; font-size:14px;'>Stock:</label><input type="text" name="stock" class="form-control"/><br><br>
      <select name="selEmpresa" id="selEmpresa" class="form-control">
		  <?php foreach ($arrEmpresa as $i)
		   echo '<option name="',$i->idempresa,'" id="',$i->idempresa,'" value="',$i->idempresa,'">',$i->des_emp,'</option>';
         ?>
             </select><br><br>
             <select name="selGenero" id="selGenero" class="form-control">
		  <?php foreach ($arrGenero as $a)
		   echo '<option name="',$a->idgenero,'" id="',$a->idgenero,'" value="',$a->idgenero,'">',$a->descripcion,'</option>';
         ?>
             </select><br><br>
             <select name="selPlataforma" id="selPlataforma" class="form-control">
		  <?php foreach ($arrPlataforma as $c)
		   echo '<option name="',$c->idplataforma,'" id="',$c->idplataforma,'" value="',$c->idplataforma,'">',$c->des_plat,'</option>';
         ?>
			 </select><br><br>
      <label style='color:white; font-size:14px;'>Imagen:</label><input type="file" name="userfile" id="userfile" class="form-control"/><br /><br />
	  <input type="hidden" name="userfile">
      <input type="submit" value="Subir imágenes" class="form-control btn-success"/>
	  </form>
	  
  </div>
  <div class="col-md-2">
  </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>