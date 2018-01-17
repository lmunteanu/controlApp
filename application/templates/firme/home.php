<!-- ### templates firme home ### -->

<!-- begin global error -->
<?php if ($TEMPLATE_VARS['globalError']) { ?>
<div class="row globalError">
   <?=$TEMPLATE_VARS['globalError'] ?>
</div>
<?php } ?>

<!-- end global error -->


<div class="row searchRw">
   
   <form class="form-inline" method="GET">
      
      <div class="form-inline ml-1 ml-sm-0 my-1">

         <?php if ($TEMPLATE_VARS['searchText']) { ?>
         <input class="form-control searchbar" id="SearchId" name="s" type="search" placeholder="<?=substr($TEMPLATE_VARS['searchText'],3)?>">
         <?php } else { ?>
         <input class="form-control searchbar" id="SearchId" name="s" type="search" placeholder="Cautare ...">
         <?php } ?>

      </div>
      
      <div class="form-inline">
         <label class="form-check-label pl-0 ml-1 ml-sm-2"> Search By: </label>

         <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio1" value="id_firma"> 
            Id
          </label>

         <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio2" value="denumire_unitate" checked>
            Nume
          </label>

         <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio3" value="adresa_pct_lucru">
            Strada
          </label>

         <label class="form-check-label ml-2">
            <input class="form-check-input" type="radio" name="searchBy" id="inlineRadio4" value="cod_caen">
            CAEN
          </label>

      </div>
   </form>

</div>
<!--   end row searchRw -->
<div class="row sortRW">
   <div class="form-inline d-md-none ml-1 ml-sm-1 mb-1 my-xs-1">
      <span>Sort By: </span>
      <a class="btn btn-primary btn-sm ml-1" role="button" href="/firme.php?sortby=Id<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> Id </a>
      <a class="btn btn-primary btn-sm ml-1" role="button" href="/firme.php?sortby=DenumireUnitate<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> Nume </a>
      <a class="btn btn-primary btn-sm ml-1" role="button" href="/firme.php?sortby=AdresaPunctLucru<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> Adresa </a>
      <a class="btn btn-primary btn-sm ml-1" role="button" href="/firme.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> UControl </a>
   </div>
</div>
<!--   end row sortRw -->
<div class="row tableRw">
   <table class="table table-responsive table-striped table-hover corectii-tabel">
      <thead class="thead-dark">
         <tr>
            <th scope="col">
               <a class='' title="sort by ID" data-toggle="tooltip" href="/firme.php?sortby=Id<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>">    
      ID. 
      </a>
            </th>
            <th scope="col">
               <a class='' title="sort by data control" data-toggle="tooltip" href="/firme.php?sortby=DenumireUnitate<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>">    
         Denumire Unitate
      </a>
            </th>
            <th scope="col">
               <a class='' title="sort by adresa punct lucru" data-toggle="tooltip" href="/firme.php?sortby=AdresaPunctLucru<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> 
         Adresa Punct Lucru
      </a>
            </th>
            <th scope="col">
               <a class='' title="sort by data control" data-toggle="tooltip" href="/firme.php?sortby=DataControl<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>">    
         Data U.Control
      </a>
            </th>
            <th scope="col">
               <a class='' title="sort by risc actual" data-toggle="tooltip" href="/firme.php?sortby=RiscActual<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>">    
         Risc actual
      </a>
            </th>
            <th scope="col">
               <a class='' title="sort by cod CAEN" data-toggle="tooltip" href="/firme.php?sortby=CAEN<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy']?>"> 
         CAEN
      </a>
            </th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($TEMPLATE_VARS['firme'] as $firma) { ?>
         <tr>
            <th scope="row">
               <a title="Adauga control" data-toggle="tooltip"
                  href="/control.php?page=add_control&idFirma=<?=htmlspecialchars($firma['id_firma'])?>">
                  <?=htmlspecialchars($firma['id_firma'])?>
               </a>
            </th>
            <td>
               <a title="Arata datele firmei" data-toggle="tooltip"
                  href="/firme.php?page=view_firma&id=<?=htmlspecialchars($firma['id_firma'])?>">
                  <?=htmlspecialchars($firma['denumire_unitate'])?>
               </a>
               
            </td>
            <td>
               <?=htmlspecialchars($firma['adresa_pct_lucru'])?>
               <div>
                  <?=htmlspecialchars($firma['telefon'])?> 
                  <a title="Call number" data-toggle="tooltip" href="tel:<?=htmlspecialchars($firma['telefon'])?>">Call</a> 
               </div>
            </td>
            <td>
               <?php if ($firma['data_control'] != 0) { ?>
               <span class="d-none only-sm"> Data control: </span>
               <a title="Arata controalele" data-toggle="tooltip"
                  href="/control.php?s=<?=htmlspecialchars($firma['id_firma'])?>">
                  <?=htmlspecialchars($firma['data_control'])?>
               </a>
               <div>
                  <?=htmlspecialchars(getNumberOfDays2("%a days ago",$firma['data_control']))?>
               </div>
               <?php } else { ?> Necontrolat
               <?php } ?>
            </td>
            <td>
               <?php if ($firma['risc_actual'] != '') { ?>
               <span class="d-none only-sm"> Risc: </span>
               <a title="Arata toate cu riscul curent" data-toggle="tooltip"
                  href="/firme.php?s=<?=htmlspecialchars($firma['risc_actual'])?>&searchBy=risc_actual">
                  <?=htmlspecialchars($firma['risc_actual'])?>
               </a>
               <?php } else { ?>
               <span class="d-none only-sm"> Risc </span> nedeterminat
               <?php } ?>
            </td>
            <td>
                 <span class="d-none only-sm"> CAEN: </span>
               <a title="Arata toate cu codul caen curent" data-toggle="tooltip"
                  href="/firme.php?s=<?=htmlspecialchars($firma['cod_caen'])?>&searchBy=cod_caen">
                  <?=htmlspecialchars($firma['cod_caen'])?>
               </a>
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
         href="/firme.php?p=1<?=$TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
               &lt&lt 
            </a>
            
      </li>
      <?php } ?>

      <?php if ($TEMPLATE_VARS['currentPage'] > 1) { ?>
      <li class="page-item">
         <a class="page-link" title="previous page" 
         href="/firme.php?p=<?=$TEMPLATE_VARS['prevPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>" > 
               &lt 
            </a>
      </li>
      <?php } ?>

      <?php for ($i = $TEMPLATE_VARS['from']; $i <= $TEMPLATE_VARS['to']; $i++) { ?>
      <?php if ($TEMPLATE_VARS['currentPage'] != $i) { ?>
      <li class="page-item">
         <a class="page-link" href="/firme.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>">
            <?=$i ?>
         </a>
      </li>
      <?php } else { ?>
      <li class="page-item disabled">
         <a class="page-link" alt="Current Page" href="/firme.php?p=<?=$i . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>">
            <?=$i ?>
         </a>
      </li>
      <?php } ?>
      <?php } ?>

      <?php for ($i = 20; $i <= $TEMPLATE_VARS['totalPages']; $i+=10) { ?>
      <?php if ($TEMPLATE_VARS['to'] < $i) { ?>
      <li class="page-item">
         <a class="page-link" href="/firme.php?p=<?=$i . $TEMPLATE_VARS['searchText'] .$TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>">
            <?=$i ?>
         </a>
      </li>
      <?php } ?>
      <?php } ?>

      <?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 1) { ?>
      <li class="page-item">
         <a class="page-link" title="next page" href="/firme.php?p=<?=$TEMPLATE_VARS['nextPage'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>"> 
                &gt
            </a>
      </li>
      <?php } ?>

      <?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 5) { ?>
      <li class="page-item">
         <a class="page-link" title="last page" href="/firme.php?p=<?=$TEMPLATE_VARS['totalPages'] . $TEMPLATE_VARS['searchText'] . $TEMPLATE_VARS['searchBy'] . $TEMPLATE_VARS['sortby']?>"> 
                &gt&gt 
            </a>
      </li>
      <?php } ?>
   </ul>
</nav>
