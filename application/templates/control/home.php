<!-- ### templates control home ### -->

<!-- begin global error -->
<?php if ($TEMPLATE_VARS['globalError']) { ?>
<div class="globalError">
    <?=$TEMPLATE_VARS['globalError'] ?>
</div>
<?php } ?>

<?php echo $TEMPLATE_VARS['actionMessage']; ?>
<!-- end global error -->


<div class="row searchRw">
    <form class="form-inline" method="GET">
        <div class="form-inline my-1 mr-2 mr-sm-0">

            <?php if ($TEMPLATE_VARS['searchText']) { ?>
            <input class="form-control searchbar" id="SearchId" name="s" type="search" placeholder="<?=substr($TEMPLATE_VARS['searchText'],3)?>">
            <?php } else { ?>
            <input class="form-control searchbar" id="SearchId" name="s" type="search" placeholder="Cautare ...">
            <?php } ?>

        </div>
        <div class="form-inline">
            <label class="form-check-label pl-0 ml-sm-2"> Search By: </label>

            <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio1" value="cid_firma" checked> 
            Id
          </label>

            <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio2" value="data_control"> 
            Data Control.
          </label>

            <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio3" value="observatii"> 
            Obs.
          </label>

        </div>
    </form>

</div>
<!--   end row searchRw -->
<div class="row sortRW">
    <div class="form-inline d-md-none mb-1 my-xs-1">
        <span>Sort By: </span>
        <a class="btn btn-primary btn-sm ml-1" href="/control.php?sortby=IdControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" role="button"> Id. Control </a>
        <a class="btn btn-primary btn-sm ml-1" href="/control.php?sortby=IdFirma<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" role="button"> Id. Firma </a>
        <a class="btn btn-primary btn-sm ml-1" href="/control.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>" role="button"> Data Control </a>
    </div>
</div>
<!--   end row sortRw -->
<div class="row tableRw">
    <table class="table table-responsive table-striped table-hover corectii-tabel">
        <thead class="table-info">
            <tr>
                <th scope="col">
                    <a class="" title="sort by Id Firma" href="/control.php?sortby=IdControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>">
                        Nr.
                    </a>
                </th>
                <th scope="col">
                    Denumire Unitate
                </th>
                <th scope="col">
                    <a class="" title="sort by Id Firma" href="/control.php?sortby=IdFirma<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>">
                        Id. Firma 
                    </a>
                </th>
                <th scope="col">
                    <a class="" title="sort by Data Control" href="/control.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> 
                        Data Control 
                    </a>
                </th>
                <th scope="col">Data introd.</th>
                <th scope="col">Data update </th>
                <th scope="col">nr_ore </th>
                <th scope="col">Observatii </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($TEMPLATE_VARS['controale'] as $control) { ?>
            <tr>
                <th scope="row">
                    <a class="" title="Modifica control" data-toggle="tooltip" href="/control.php?page=add_control&id=<?=htmlspecialchars($control['id_control'])?>">
                        <?=htmlspecialchars($control['id_control'])?>
                    </a>
                </th>
                <td>
                    <a class="" title="Arata datele firmei" data-toggle="tooltip" href="/firme.php?s=<?=htmlspecialchars($control['cid_firma'])?>&searchBy=id_firma">
                        <?=htmlspecialchars(Firma::getStaticDenumireFirma($control['cid_firma']))?>
                    </a>
                </td>
                <td>
                    <a class="" title="Afiseaza toate controalele" data-toggle="tooltip" href="/control.php?s=<?=htmlspecialchars($control['cid_firma'])?>">
                        <?=htmlspecialchars($control['cid_firma'])?>
                    </a>

                </td>
                <td>
                    <?=htmlspecialchars($control['data_control'])?>
                        <div>
                            <?=htmlspecialchars(getNumberOfDays2("%a days ago",$control['data_control']))?>
                        </div>
                </td>
                <td>
                    <?=htmlspecialchars($control['data_start'])?>
                </td>
                <td>
                    <?=htmlspecialchars($control['data_update'])?>
                </td>
                <td>
                    <?=htmlspecialchars($control['nr_ore'])?>
                </td>
                <td>
                    <?=htmlspecialchars($control['observatii'])?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- end row tablerw -->

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

    <?php if ($TEMPLATE_VARS['currentPage'] > 3) { ?>
        <li class="page-item">
            <a class='page-link' title="first page"
               href="/control.php?p=1<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
               &lt&lt 
            </a>
        </li>
    <?php } ?>	
    
    <?php if ($TEMPLATE_VARS['currentPage'] > 1) { ?>
        <li class="page-item">
            <a class="page-link" title="previous page"
               href="/control.php?p=<?=$TEMPLATE_VARS['prevPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
               &lt 
            </a>
        </li>
    <?php } ?>

    <?php for ($i = $TEMPLATE_VARS['from']; $i <= $TEMPLATE_VARS['to']; $i++) { ?>
        <?php if ($TEMPLATE_VARS['currentPage'] != $i) { ?>
        <li class="page-item">
           	<a class="page-link" 
               href="/control.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
           	    <?=$i ?> 
            </a>
        </li>
        <?php } else { ?>
        <li class="page-item disabled">
        	<a class="page-link" alt="Current Page" 
               href="/control.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
           	    <?=$i ?> 
           </a>
        </li>
        <?php } ?>
    <?php } ?>
   
    <?php for ($i = 20; $i <= $TEMPLATE_VARS['totalPages']; $i+=10) { ?>
    	<?php if ($TEMPLATE_VARS['to'] < $i) { ?>
    	 <li class="page-item">
    		<a class="page-link" href="/control.php?p=<?=$i . $TEMPLATE_VARS['searchText'] .$TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>"> 
    			<?=$i ?> 
    		</a>
    	</li>
       <?php } ?>
    <?php } ?>
       
    <?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 1) { ?>	
         <li class="page-item">
            <a class="page-link" title="next page"
               href="/control.php?p=<?=$TEMPLATE_VARS['nextPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
                &gt
            </a>
        </li>
    <?php } ?>
   
    <?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 5) { ?>
        <li class="page-item">
            <a class="page-link" title="last page"
               href="/control.php?p=<?=$TEMPLATE_VARS['totalPages'] . $TEMPLATE_VARS['searchText']?>" >
                &gt&gt 
            </a>
        </li>
    <?php } ?>	
    </ul>
</nav>

