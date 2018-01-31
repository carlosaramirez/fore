<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-lg-5 col-lg-offset-4 text-center"><h2><?=$city->name;?>, <?=$city->country;?></h2><?=($logged)?$butons:"";?></div>
</div>

<div class="row">
	<div class="col-lg-6">
		<span>Temperature: <span class="badge"><?=(isset($weather->temperature))? $weather->temperature: "0"; ?>&deg;</span></span>
	</div>
	<div class="col-lg-6">
		<span>Pressure: <span class="badge"><?=(isset($weather->pressure))? $weather->pressure: "0"; ?></span></span>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<span>Humidity: <span class="badge"><?=(isset($weather->humidity))? $weather->humidity: "0"; ?> &#37;</span></span>
	</div>
	<div class="col-lg-6">
		<span>Max temperature: <span class="badge"><?=(isset($weather->max_temperature))? $weather->max_temperature: "0"; ?>&deg; </span></span>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<span>Min temperature: <span class="badge"><?=(isset($weather->min_temperature))? $weather->min_temperature: "0"; ?>&deg;</span></span>
	</div>
	<div class="col-lg-6">
		<span></span>
	</div>
</div>
<div class="row">
	<br>
</div>
<div class="row">
	<div class="col-lg-12">
		<iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDja5Y4D11r3KETfjNHpXev8nrFQ03OK7c&center=<?=$city->cord_lat?>,<?=$city->cord_lon?>&zoom=9" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>

	</div>
</div>
<div class="row">
	<br><br>
</div>