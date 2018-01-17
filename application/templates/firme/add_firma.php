	<?php echo $TEMPLATE_VARS['actionMessage']; ?> 
		<?php echo $TEMPLATE_VARS['validationMessage']; ?>
		
<div class="form-inline my-1">
	<button type="button" class="btn btn-primary btn-sm " onclick="goBack()">Go Back</button>
</div>
<div class="row">
	<div class="col-md-8 offset-md-2">

		<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">

			<div class="form-group">
				<label for="input1">Denumire firma:</label>
				<input class="form-control" type="textarea" id="input1" placeholder="Denumire firma" 
						name="firma-denumire" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->denumire_unitate)?>" />
			</div>

			<div class="form-group">
				<label for="input2">Adresa firma:</label>
				<input class="form-control" type="textarea" id="input2" placeholder="Adresa firma" 
						name="firma-adresa" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->adresa)?>" />
			</div>

			<div class="form-group">
				<label for="input3">Numar strada:</label>
				<input class="form-control" type="textarea" id="input3" placeholder="Numar strada" 
						name="firma-nr_strada" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->nr_strada)?>" />
			</div>

			<div class="form-group">
				<label for="input4">CUI:</label>
				<input class="form-control" type="textarea" id="input4" placeholder="CUI" 
						name="firma-cui" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->cui)?>" />
			</div>

			<div class="form-group">
				<label for="input5">Cod CAEN::</label>
				<input class="form-control" type="textarea" id="input5" placeholder="Cod CAEN" 
						name="firma-caen" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->cod_caen)?>" />
			</div>

			<div class="form-group">
				<label for="firma-categorie">Categorie:</label>
				<select class="form-control" name="firma-categorie" id="firma-categorie">
         	<option value="Patiserii" <?=$TEMPLATE_VARS['firma']->categorie==='Patiserii' ? 'selected' : '' ?>> Patiserii</option>
				<option value="Placintarii" <?=$TEMPLATE_VARS['firma']->categorie==='Placintarii' ? 'selected' : '' ?>> Placintarii</option>
        </select>
			</div>

			<div class="form-group">
				<label for="input7">Persoana contact:</label>
			<?php if ($TEMPLATE_VARS['firma']->id_firma) { ?>	
				<input class="form-control" type="textarea" id="input7" placeholder="Nespecificat" 
						name="firma-contact" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->persoana_contact)?>" />
			<?php } else { ?>
				<input class="form-control" type="textarea" id="input7" placeholder="Persoana contact" 
						name="firma-contact" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->persoana_contact)?>" />
			<?php } ?>
			</div>

			<div class="form-group">
				<label for="input8">Adresa punct lucru:</label>
				<input class="form-control" type="textarea" id="input8" placeholder="Adresa punct lucru" 
						name="firma-adresa_pct_lucru" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->adresa_pct_lucru)?>" />
			</div>

			<div class="form-group">
				<label for="input9">Numar doc. inregistrare:</label>
				<input class="form-control" type="textarea" id="input9" placeholder="Numar doc. inregistrare" 
						name="firma-nr_doc" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->nr_doc_inregistrare)?>" />
			</div>

			<div class="form-group">
				<label for="firma-risc">Risc</label>
				<select class="form-control" name="firma-risc" id="firma-risc">
		         <option value="SCAZUT" <?=$TEMPLATE_VARS['firma']->risc_actual==='SCAZUT' ? 'selected' : '' ?>> SCAZUT</option>
					<option value="MEDIU" <?=$TEMPLATE_VARS['firma']->risc_actual==='MEDIU' ? 'selected' : '' ?>> MEDIU</option>
					<option value="RIDICAT" <?=$TEMPLATE_VARS['firma']->risc_actual==='RIDICAT' ? 'selected' : '' ?>> RIDICAT</option>
	        </select>
			</div>

			<div class="form-group">
				<label for="input11">Numar ore control:</label>
				<input class="form-control" type="textarea" id="input11" placeholder="Numar ore control" 
						name="firma-ore" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->ore_control)?>" />
			</div>

			<div class="form-group">
				<label for="input12">Telefon:</label>
				<input class="form-control" type="textarea" id="input12" placeholder="Telefon" 
						name="firma-telefon" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->telefon)?>" />
			</div>

			<div class="form-group">
				<label for="input13">Observatii:</label>
				<input class="form-control" type="textarea" id="input13" placeholder="Observatii" 
						name="firma-observatii" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['firma']->observatii)?>" />
			</div>

			<input class="btn btn-primary mb-1" name="Salveaza modificarile" type="submit" value="Salveaza firma" />
		</form>
	</div>
</div>
  