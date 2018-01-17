<div align="center" style="width: 500px; height: auto; border: 1px;">
		<?php echo $TEMPLATE_VARS['actionMessage']; ?> 
		<?php echo $TEMPLATE_VARS['validationMessage']; ?>
	<!--	<a href="/firme.php"> &lt---Inapoi </a> -->
		 <!--<a href="/firme.php?page=view_firma&id=<=htmlspecialchars($TEMPLATE_VARS['firma']->id_firma)?>">-->
   <!--            &lt---Inapoi-->
   <!--         </a>-->
   <button onclick="goBack()">Go Back</button>
<form method="POST"  enctype="multipart/form-data" action="">
Denumire firma:
	<br>
   <input class="input-denumire" type="textarea" placeholder="Denumire firma" 
			name="firma-denumire" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->denumire_unitate)?>" />
	<br>
Adresa firma:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Adresa firma" 
			name="firma-adresa" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->adresa)?>" />
	<br>
Numar strada:
	<br>
	<input class="input-nr_strada" type="textarea" placeholder="Numar strada" 
			name="firma-nr_strada" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->nr_strada)?>" />
	<br>
CUI:
	<br>
	<input class="input-adresa" type="textarea" placeholder="CUI" 
			name="firma-cui" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->cui)?>" />
	<br>
Cod CAEN:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Cod CAEN" 
			name="firma-caen" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->cod_caen)?>" />
	<br>
		<label for="firma-categorie">Categorie:</label>
		<br>
		<select name="firma-categorie">
			<option value="Patiserii" <?=$TEMPLATE_VARS['firma']->categorie==='Patiserii' ? 'selected' : '' ?>> Patiserii</option>
			<option value="Placintarii" <?=$TEMPLATE_VARS['firma']->categorie==='Placintarii' ? 'selected' : '' ?>> Placintarii</option>
		</select>
<!--Categorie:-->
<!--	<br>-->
<!--	<input class="input-adresa" type="textarea" placeholder="Categorie" -->
<!--			name="firma-categorie" -->
<!--			value="<=htmlspecialchars($TEMPLATE_VARS['firma']->categorie)?>" />-->
	<br>
Persoana contact:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Persoana contact" 
			name="firma-contact" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->persoana_contact)?>" />
	<br>
Adresa punct lucru:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Adresa punct lucru" 
			name="firma-adresa_pct_lucru" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->adresa_pct_lucru)?>" />
	<br>
Numar doc. inregistrare:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Numar doc. inregistrare" 
			name="firma-nr_doc" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->nr_doc_inregistrare)?>" />
	<br>
		<label for="firma-risc">Categorie:</label>
		<br>
		<select name="firma-risc">
			<option value="SCAZUT" <?=$TEMPLATE_VARS['firma']->risc_actual==='SCAZUT' ? 'selected' : '' ?>> SCAZUT</option>
			<option value="MEDIU" <?=$TEMPLATE_VARS['firma']->risc_actual==='MEDIU' ? 'selected' : '' ?>> MEDIU</option>
			<option value="RIDICAT" <?=$TEMPLATE_VARS['firma']->risc_actual==='RIDICAT' ? 'selected' : '' ?>> RIDICAT</option>
		</select>
<!--Risc actual:-->
<!--	<br>-->
<!--	<input class="input-adresa" type="textarea" placeholder="Risc actual" -->
<!--			name="firma-risc" -->
<!--			value="<=htmlspecialchars($TEMPLATE_VARS['firma']->risc_actual)?>" />-->
	<br>
Numar ore control:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Numar ore control" 
			name="firma-ore" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->ore_control)?>" />
	<br>
Telefon:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Telefon" 
			name="firma-telefon" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->telefon)?>" />
	<br>
Observatii:
	<br>
	<input class="input-adresa" type="textarea" placeholder="Observatii" 
			name="firma-observatii" 
			value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->observatii)?>" />
	<br>
	<input name="Submit" type="submit" value="Salveaza firma" />
</form>
</div>