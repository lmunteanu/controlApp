<!--<php echo $TEMPLATE_VARS['actionMessage']; ?> -->
<?php echo $TEMPLATE_VARS['validationMessage']; ?>
<!--<a href="/control.php"> &lt---Inapoi </a>-->
<div class="form-inline my-1">
	<button type="button" class="btn btn-primary btn-sm " onclick="goBack()">Go Back</button>
</div>
<div class="row">
	<div class="col-md-8 offset-md-2">
		
	<?php if ($TEMPLATE_VARS['cId']) { ?>		
		<h2> Editeaza control </h2>
	<?php } else { ?>
		<h2> Adauga control </h2>
	<?php } ?>

	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">

	<div class="form-group">
		<label for="input1">Id firma:</label>
		<input class="form-control" type="textarea" id="input1" placeholder="id firma"
				name="firma-id_firma"
				value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->cid_firma)?>" />
	</div>
	
<?php if ($TEMPLATE_VARS['controale']->cid_firma) { ?>
		<div class="form-group">
			<label for="input1-1">Nume firma:</label>
			<input class="form-control" type="textarea" id="input1-1" placeholder="nume firma"
					name="firma-nume_firma"
					value="<?=htmlspecialchars(Firma::getStaticDenumireFirma($TEMPLATE_VARS['controale']->cid_firma))?>" />
		</div>
<?php } ?>

	<div class="form-group">
		<label for="input2">Data control: (Year/Month/Day)</label>
		<input class="form-control dp" type="textarea" id="input2" placeholder="data control"
				name="firma-data_control"
				value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->data_control)?>" />
	</div>

	<div class="form-group">
		<label for="input3">Data introducere:</label>
		<input class="form-control" type="textarea" id="input3" placeholder="data start"
				name="firma-data_start" disabled
				value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->data_start)?>" />
	</div>
	
	<div class="form-group">
		<label for="input4">Data modificare:</label>
		<input class="form-control" type="textarea" id="input4" placeholder="data update"
				name="firma-data_update" disabled
				value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->data_update)?>" />
	</div>

	<div class="form-group">
		<label for="input5">Ore control:</label>
		<input class="form-control" type="textarea" id="input5" placeholder="Numar ore control"
				name="firma-nr_ore"
				value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->nr_ore)?>" />
	</div>

	<div class="form-group">
		<label for="input6">Observatii:</label>
		<input class="form-control" type="textarea" id="input6" placeholder="observatii"
				name="firma-observatii"
				value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->observatii)?>" />
	</div>

	<input class="btn btn-primary" name="Salveaza controlul" type="submit" value="Salveaza control" />
		</form>
	</div>
</div>
  