<!-- ### templates firme home ### -->

<!-- begin global error -->
<?php if ($TEMPLATE_VARS['globalError']) { ?>
 			<div class="globalError">
 				<?=$TEMPLATE_VARS['globalError'] ?>
 			</div>
<?php } ?>	
<!-- end global error -->

<!-- begin search -->
<div class="search-div">
<form method="GET">
  
      <?php if ($TEMPLATE_VARS['searchText']) { ?>
               <input class="searchbar" name="s" type="search" placeholder="<?=substr($TEMPLATE_VARS['searchText'],3)?>">
      <?php } else { ?>
               <input class="searchbar" name="s" type="search" placeholder="Cautare ...">
      <?php } ?>
      
   <div class=searchbar>
      <p>Search By:</p>
      <p>
         <input type="radio" id="first" name="searchBy" value="id_firma">
         <label for="first">Id</label>
      </p>
      <p>
         <input type="radio" id="second" name="searchBy" value="denumire_unitate" checked>
         <label for="second">Nume</label>
      </p>
      <p>
         <input type="radio" id="third" name="searchBy" value="adresa_pct_lucru">
         <label for="third">Strada</label>
      </p>
      <p>
         <input type="radio" id="forth" name="searchBy" value="cod_caen">
         <label for="forth">CAEN</label>
      </p>
   </div>
   <div class=sortBar>
      <p>Sort By:</p>
      <a class="abutton" href="/firme.php?sortby=Id<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > Id </a>
      <a class="abutton" href="/firme.php?sortby=DenumireUnitate<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > Nume </a>
      <a class="abutton" href="/firme.php?sortby=AdresaPunctLucru<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > Adresa </a>
      <a class="abutton" href="/firme.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"  > UControl </a>
   </div>
</form>
</div>
<!-- end search -->

<table class="tabel-firme">
<thead>
<tr>
   <th>
      <a class='' title="sort by ID"
      href="/firme.php?sortby=Id<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >    
      ID. 
      </a>
   </th>
   <th>
      <a class='' title="sort by data control"
         href="/firme.php?sortby=DenumireUnitate<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >    
         Denumire Unitate
      </a>
   </th>
   <th>
      <a class='' title="sort by adresa punct lucru"
         href="/firme.php?sortby=AdresaPunctLucru<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > 
         Adresa Punct Lucru
      </a>
   </th>
   <th>
      <a class='' title="sort by data control"
         href="/firme.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >    
         Data U.Control
      </a>
   </th>
   <th>
      <a class='' title="sort by risc actual"
         href="/firme.php?sortby=RiscActual<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >    
         Risc actual
      </a>
   </th>
   <th>
      <a class='' title="sort by cod CAEN"
         href="/firme.php?sortby=CAEN<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > 
         CAEN
      </a>
   </th>
</tr>
</thead>
<tbody>
<?php foreach ($TEMPLATE_VARS['firme'] as $firma) { ?>
<tr>
   <td>
      <a href="/control.php?page=add_control&idFirma=<?=htmlspecialchars($firma['id_firma'])?>">
         <?=htmlspecialchars($firma['id_firma'])?>
      </a> 
   </td>    
   <td> 
      <a href="/firme.php?page=view_firma&id=<?=htmlspecialchars($firma['id_firma'])?>">
         <?=htmlspecialchars($firma['denumire_unitate'])?>
      </a>
      <div>tel: <?=htmlspecialchars($firma['telefon'])?></div> 
   </td>
   <td> <?=htmlspecialchars($firma['adresa_pct_lucru'])?> </td>  
   <td>
      <?php if ($firma['data_control'] != 0) { ?>
         <span class="mobile-view"> Data control: </span> 
         <a href="/control.php?s=<?=htmlspecialchars($firma['id_firma'])?>">
            <?=htmlspecialchars($firma['data_control'])?> 
         </a> 
         <div><?=htmlspecialchars(getNumberOfDays2("%a days ago",$firma['data_control']))?></div>
      <?php } else { ?>    
         Necontrolat
      <?php } ?>
   </td> 
   <td>  
      <?php if ($firma['risc_actual'] != '') { ?>
         <span class="mobile-view"> Risc: </span> 
         <a href="/firme.php?s=<?=htmlspecialchars($firma['risc_actual'])?>&searchBy=risc_actual">
             <?=htmlspecialchars($firma['risc_actual'])?> 
         </a> 
      <?php } else { ?>    
         <span class="mobile-view"> Risc </span>  
         nedeterminat
      <?php } ?>    
   </td>
   <td> 
      <a href="/firme.php?s=<?=htmlspecialchars($firma['cod_caen'])?>&searchBy=cod_caen">
         <?=htmlspecialchars($firma['cod_caen'])?> 
      </a> 
   </td>
</tr>
<?php } ?>
</tbody>
</table>

 <!-- begin Pagination -->
<div class="paginator">
	<?php if ($TEMPLATE_VARS['currentPage'] > 6) { ?>
      <a class="zerospacing" title="first page"
         href="/firme.php?p=1<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
         &lt&lt 
      </a>
	<?php } ?>	
	
	<?php if ($TEMPLATE_VARS['currentPage'] > 1) { ?>
      <a title="previous page"
         href="/firme.php?p=<?=$TEMPLATE_VARS['prevPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
         &lt 
      </a>
	<?php } ?>	
	
	<?php for ($i = $TEMPLATE_VARS['from']; $i <= $TEMPLATE_VARS['to']; $i++) { ?>
		<?php if ($TEMPLATE_VARS['currentPage'] != $i) { ?>
			<a href="/firme.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>"> 
				<?=$i ?> 
			</a>
		<?php } else { ?>
			<span class="activeP" alt="Current Page"> 
				<?=$i ?> 
			</span>	
		<?php } ?>
	<?php } ?>
	
	<?php for ($i = 20; $i <= $TEMPLATE_VARS['totalPages']; $i+=10) { ?>
		<?php if ($TEMPLATE_VARS['to'] < $i) { ?>
			<a class="aBold" href="/firme.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>"> 
				<?=$i ?> 
			</a>
	   <?php } ?>
	<?php } ?>
	
	<?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 1) { ?>	
		<a href="/firme.php?p=<?=$TEMPLATE_VARS['nextPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" 
		   title="next page"> 
	      &gt 
		</a>
	<?php } ?>	
	
	<?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 5) { ?>	
   		<a class="zerospacing last" title="last page"
   		   href="/firme.php?p=<?=$TEMPLATE_VARS['totalPages'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
   	      &gt&gt 
   		</a>
	<?php } ?>	
</div>	
<!-- end pagination -->