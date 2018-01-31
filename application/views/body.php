<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid header">
	<div class="row"><br></div>
	<div class="row ">
		<div class="ol-xs-2 col-sm-1 col-md-1 col-lg-2">
			<?php if ($logged) {?>
			 <div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle"  type="button" data-toggle="dropdown" style="background-color:blue;">
				  <span class="caret"></span></button>
			
			  
			</div> 
			<?php }?>
		</div>
		<div class="col-xs-7 col-sm-5 col-md-5 col-lg-8 text-center"><h1><strong>Forecast</strong></h1></div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 ">
			<div class="row">
				<div class="col-lg-12" ><?=($logged)?"":'<button type="button" class="btn" data-toggle="popover"   data-placement="bottom" id="user" >';?><i class="fa fa-user fa-4x"  aria-hidden="true" ></i><?=($logged)?"":'</button>';?></div>
			</div>
			<div class="row">
				<div class="col-lg-12 " style="color:white;"><span><?=(isset($user))?$user->nombre:"";?></span></div>
			</div>
			
			
		</div>
		
	</div>
	
	
</div>

<div class="container-fluid" >
	<div class="row"><br><div class="col-lg-6 col-lg-offset-3 text-center"><?php 
		if(isset($msj))
		{
			echo $msj;
		}
	?></div><br></div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 col-md-offset-3 col-sm-offset-4 col-lg-offset-3 text-center" id='central'>
			<form class="form-inline">
			  <div class="form-group">
			    <label class="sr-only" for="city">City</label>
			    <div class="input-group">
			      
			      <input type="text" class="form-control" id="city" placeholder="City">
			      <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>

			    </div>
			    <div id="opcs"></div>
			  </div>
			  
			</form>
		</div>
	</div>
	<div class="row">
		<br><br>
	</div>
	<div class="row">
		<div id="forecast" class="col-xs-12 col-sm-4 col-md-6 col-lg-6 col-md-offset-3 col-sm-offset-4 col-lg-offset-3 text-center">
			
		</div>
	</div>
</div>
</body>