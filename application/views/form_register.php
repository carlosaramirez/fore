<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-ofsset-6">
			<form  action="<?=base_url('User/guardar_usuario');?>" method="POST">
		  <div class=" form-group">
		    <label for="nombre">Nombre</label>
		    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required="">
		  </div>
		  <div class="form-group">
		    <label for="apellido">Apellido</label>
		    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="" required="">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@example.com" required="">
		  </div>
		  <button type="submit" class="btn btn-default">Guardar</button>
		</form>
		</div>
	</div>
</div>