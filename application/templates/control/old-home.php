<!-- ### templates control home ### -->

<!-- begin global error -->
<?php if ($TEMPLATE_VARS['globalError']) { ?>
 			<div class="globalError">
 				<?=$TEMPLATE_VARS['globalError'] ?>
 			</div>
<?php } ?>
<!-- end global error -->

	<?php echo $TEMPLATE_VARS['actionMessage']; ?> 
	
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
                    <input type="radio" id="first" name="searchBy" value="cid_firma" checked>
                    <label for="first">Id Firma</label>
                </p>
                <p>
                    <input type="radio" id="second" name="searchBy" value="data_control" >
                    <label for="second">Data Control</label>
                </p>
                <p>
                    <input type="radio" id="third" name="searchBy" value="observatii">
                    <label for="third">Observatii</label>
                </p>
            </div>
            <div class=sortBar>
                <p>Sort By:</p>
                <a class="abutton albastru" href="/control.php?sortby=IdControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > Id. Control </a>
                <a class="abutton albastru" href="/control.php?sortby=IdFirma<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > Id. Firma </a>
                <a class="abutton albastru" href="/control.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > Data Control </a>
            </div>
    </form>
</div>
<!-- end search -->

<table class="tabel-firme albastru">
<thead>
<tr>
    <th>
         <a  class="" title="sort by Id Firma"
            href="/control.php?sortby=IdControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >
        Nr.
        </a>
    </th>
    <th>
        <a  class="" title="sort by Id Firma"
            href="/control.php?sortby=IdFirma<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >
        Denumire Unitate
        </a>
    </th>
    <th>
        <a  class="" title="sort by Id Firma"
            href="/control.php?sortby=IdFirma<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" >
        Id. Firma 
        </a>
    </th>
    <th>
        <a  class="" title="sort by Data Control"
            href="/control.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" > 
        Data Control 
        </a>
    </th>
    <th>Data introd.</th>
    <th>Data update</th>
    <th>nr_ore</th>
    <th>Observatii</th>
</tr>
</thead>
<tbody>
<?php foreach ($TEMPLATE_VARS['controale'] as $control) { ?>
    <tr>
    <td> 
        <a class="" title="Modifica control" 
           href="/control.php?page=add_control&id=<?=htmlspecialchars($control['id_control'])?>">
            <?=htmlspecialchars($control['id_control'])?> 
        </a> 
    </td>    
    <td> 
        <a class="" title="Arata datele firmei" 
           href="/firme.php?s=<?=htmlspecialchars($control['cid_firma'])?>&searchBy=id_firma">
            <?=htmlspecialchars(Firma::getStaticDenumireFirma($control['cid_firma']))?> 
        </a>          
    </td>  
    <td> 
        <a class="" title="Cauta dupa id firma" 
           href="/control.php?s=<?=htmlspecialchars($control['cid_firma'])?>">
            <?=htmlspecialchars($control['cid_firma'])?> 
        </a>    
    </td>
    <td> 
        <?=htmlspecialchars($control['data_control'])?> 
        <div><?=htmlspecialchars(getNumberOfDays2("%a days ago",$control['data_control']))?></div>
    </td>  
    <td> <?=htmlspecialchars($control['data_start'])?> </td>  
    <td> <?=htmlspecialchars($control['data_update'])?> </td>  
    <td> <?=htmlspecialchars($control['nr_ore'])?> </td>  
    <td> <?=htmlspecialchars($control['observatii'])?> </td>
</tr>
<?php } ?>
</tbody>
</table>

<!-- begin Pagination -->
<div class='paginator'>
    <?php if ($TEMPLATE_VARS['currentPage'] > 6) { ?>
        <a class='zerospacing' title="first page"
           href="/control.php?p=1<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
        &lt&lt 
        </a>
    <?php } ?>	
   
    <?php if ($TEMPLATE_VARS['currentPage'] > 1) { ?>
        <a title="previous page"
           href="/control.php?p=<?=$TEMPLATE_VARS['prevPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
        &lt 
        </a>
    <?php } ?>
   
   <?php for ($i = $TEMPLATE_VARS['from']; $i <= $TEMPLATE_VARS['to']; $i++) { ?>
   	<?php if ($TEMPLATE_VARS['currentPage'] != $i) { ?>
   		<a href="/control.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
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
			<a class="aBold" href="/control.php?p=<?=$i . $TEMPLATE_VARS['searchText'] .$TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>"> 
				<?=$i ?> 
			</a>
	   <?php } ?>
	<?php } ?>
   
   <?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 1) { ?>	
        <a title="next page"
           href="/control.php?p=<?=$TEMPLATE_VARS['nextPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
        &gt
        </a>
   <?php } ?>	
   
    <?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 5) { ?>	
        <a class="zerospacing last" title="last page"
           href="/control.php?p=<?=$TEMPLATE_VARS['totalPages'] . $TEMPLATE_VARS['searchText']?>" >
        &gt&gt 
        </a>
    <?php } ?>	
</div>	
<!-- end pagination -->

<a href="/control.php/?page=add_control">Adauga control</a>