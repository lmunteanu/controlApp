<div class="form-div">
    <form class="floatleft" method="POST"  enctype="multipart/form-data" action="">
       <fieldset>
          <legend>Stats between:</legend>
         
          <?php if ($TEMPLATE_VARS['globalError']) { ?>
 			<div class="globalError">
 				<?=$TEMPLATE_VARS['globalError'] ?>
 			</div>
         <?php } ?>
             Data1:
           <input class="dp" type="text" name="data1"
                   value="<?=htmlspecialchars($TEMPLATE_VARS['data1'])?>"
           ><br>
             Data2: 
           <input class="dp" type="text" name="data2"
                   value="<?=htmlspecialchars($TEMPLATE_VARS['data2'])?>"
           ><br>
          
          <input type="submit" name="Submit"  value="Give me stats" />
       </fieldset>
    </form>
    <div class="rightform floatleft">
        <?php if ($TEMPLATE_VARS['controlCountText']) { ?>
             <div class="">
             	<?=$TEMPLATE_VARS['controlCountText'] ?>
             </div>
        <?php } ?>	
        <?php if ($TEMPLATE_VARS['stats']) { ?>
             <div class="">
             	<?=$TEMPLATE_VARS['stats'] ?>
             </div>
        <?php } ?>	
    </div>
</div> <!-- end form-div -->

<?php if ($TEMPLATE_VARS['controale']) { ?>
<table class="tabel-firme albastru clearfloat">
   <thead>
      <tr>
          <th>Nr. </th>
          <th>Denumire Unitate </th>
          <th>Id. Firma </th>
          <th>Data Control </th>
          <th>Data introd.</th>
          <th>Data update </th>
          <th>nr_ore </th>
          <th>Observatii </th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($TEMPLATE_VARS['controale'] as $control) { ?>
      <tr>
        <td> 
            <a class='' href="/control.php?page=add_control&id=<?=htmlspecialchars($control['id_control'])?>">
                <?=htmlspecialchars($control['id_control'])?> 
            </a> 
        </td>    
        <td> 
            <a class='' href="/firme.php?s=<?=htmlspecialchars($control['cid_firma'])?>&searchBy=Id" title="">
                <?=htmlspecialchars(Firma::getStaticDenumireFirma($control['cid_firma']))?> 
            </a>          
        </td>  
        <td> 
            <a class='' href="/control.php?s=<?=htmlspecialchars($control['cid_firma'])?>" title="">
                <?=htmlspecialchars($control['cid_firma'])?> 
            </a>    
        </td>
        <td> <?=htmlspecialchars($control['data_control'])?> </td>  
        <td> <?=htmlspecialchars($control['data_start'])?> </td>  
        <td> <?=htmlspecialchars($control['data_update'])?> </td>  
        <td> <?=htmlspecialchars($control['nr_ore'])?> </td>  
        <td> <?=htmlspecialchars($control['observatii'])?> </td>
      </tr>
      <?php } ?>
   </tbody>
</table>
<?php } else { ?>
<div class="clearfloat">
   <?="nothing found"?>
</div>   
<?php } ?>

