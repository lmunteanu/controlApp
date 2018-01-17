<div align="center" style="width: 500px; height: auto; border: 1px;">
		<!--<php echo $TEMPLATE_VARS['actionMessage']; ?> -->
		<?php echo $TEMPLATE_VARS['validationMessage']; ?>
		<!--<a href="/control.php"> &lt---Inapoi </a>-->
		<button class="abutton" onclick="goBack()">Go Back</button>
<form method="POST"  enctype="multipart/form-data" action="">
Id firma:
	<br>
   <input class="input-id_firma" type="textarea" placeholder="id firma" 
			name="firma-id_firma" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->cid_firma)?>" />
	<br>
Data control:
	<br>
	<span>Year/Month/Day</span>
	<br>
	<input class="input-data dp" type="textarea" placeholder="data control" 
			name="firma-data_control" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->data_control)?>" />
	<br>
Data introducere:
	<br>
	<input class="input-data_start" type="textarea" placeholder="data start" 
			name="firma-data_start" disabled
			value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->data_start)?>" />
	<br>
Data modificare:
	<br>
	<input class="input-data_update" type="textarea" placeholder="data update" 
			name="firma-data_update" disabled
			value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->data_update)?>" />
	<br>
Ore control:
	<br>
	<input class="input-nr_ore" type="textarea" placeholder="Numar ore control" 
			name="firma-nr_ore" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->nr_ore)?>" />
	<br>
Observatii:
	<br>
	<input class="input-observatii" type="textarea" placeholder="observatii" 
			name="firma-observatii" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['controale']->observatii)?>" />
	<br>
	<input name="Submit" type="submit" value="Salveaza control" />
</form>
</div>