
<div class="row butons-row">
   <div class="form-inline ">
     <button type="button" class="btn btn-primary btn-sm mr-1 my-1" onclick="goBack()">Go Back</button>
     <a class="btn btn-primary btn-sm mr-1 my-1" role="button" 
        href="/firme.php?page=add_firma&id=<?=htmlspecialchars($TEMPLATE_VARS['firma']->id_firma)?>"> 
        Editeaza firma 
      </a>
       <a class="btn btn-primary btn-sm mr-1" role="button" 
        href="control.php?s=<?=htmlspecialchars($TEMPLATE_VARS['firma']->id_firma)?>"> 
        Afiseaza controale
      </a>
      <a class="btn btn-primary btn-sm" role="button" 
        href="control.php?page=add_control&idFirma=<?=htmlspecialchars($TEMPLATE_VARS['firma']->id_firma)?>"> 
        Adauga control
      </a>
   </div>
</div>
<div class="row view-firma-row mt-1">
   <div class="form-block">

   <p>ID: <?=htmlspecialchars($TEMPLATE_VARS['firma']->id_firma)?></p>
   
   <p>Numele firmei: <?=htmlspecialchars($TEMPLATE_VARS['firma']->denumire_unitate)?></p>
   <p>Adresa:  <?=htmlspecialchars($TEMPLATE_VARS['firma']->adresa)?> Nr. strada:
               <?=htmlspecialchars($TEMPLATE_VARS['firma']->nr_strada)?>
   </p>
   <p>Telefon: <?=htmlspecialchars($TEMPLATE_VARS['firma']->telefon)?></p>
   <p>Persoana contact: <?=htmlspecialchars($TEMPLATE_VARS['firma']->persoana_contact)?></p>
   <p>Adresa punct lucru: <?=htmlspecialchars($TEMPLATE_VARS['firma']->adresa_pct_lucru)?></p>
   <p>CUI: <?=htmlspecialchars($TEMPLATE_VARS['firma']->cui)?></p>
   <p>Nr. Doc. de inregistrare: <?=htmlspecialchars($TEMPLATE_VARS['firma']->nr_doc_inregistrare)?></p>
   <p>CAEN: <?=htmlspecialchars($TEMPLATE_VARS['firma']->cod_caen)?></p>
   <p>Categorie: <?=htmlspecialchars($TEMPLATE_VARS['firma']->categorie)?></p>
   <p>Risc: <?=htmlspecialchars($TEMPLATE_VARS['firma']->risc_actual)?></p>
   <p>Ore control: <?=htmlspecialchars($TEMPLATE_VARS['firma']->ore_control)?></p>
   <p>Observatii: <?=htmlspecialchars($TEMPLATE_VARS['firma']->observatii)?></p>
   <p>Data start: <?=htmlspecialchars($TEMPLATE_VARS['firma']->data_start)?></p>
   <p>Data sfarsit: <?=htmlspecialchars($TEMPLATE_VARS['firma']->data_sfarsit)?></p>
   <p>Ultima modificare: <?=htmlspecialchars($TEMPLATE_VARS['firma']->data_update)?></p>
   
   </div>
</div>
