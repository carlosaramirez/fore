<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-ofsset-6">
			<form  action="<?=base_url('User/login');?>" method="POST">
		 
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@example.com" required="">
		  </div>
		  <button type="submit" class="btn btn-default">enviar</button>
		</form>
		</div>
	</div>
</div>