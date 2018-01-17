<div class="row statsRw">
    <div class="col-sm-4 col-lg-3 statsPeriod">
        <form class="form-stats" method="POST" enctype="multipart/form-data" action="">
            <h4 class="form-signin-heading">Stats period:</h4>

            <div class="form-group form-group-sm">
                <!-- <label for="inputDate1" class="sr-only">Data1:</label> -->
                <input class="form-control form-control-sm dp" id="inputDate1" type="text" 
                        name="data1" value="<?=htmlspecialchars($TEMPLATE_VARS['data1'])?>">
            </div>
            <div class="form-group form-group-sm">
                <!-- <label for="inputDate2" class="sr-only">Data2:</label> -->
                <input class="form-control form-control-sm dp" id="inputDate2" type="text" 
                        name="data2" value="<?=htmlspecialchars($TEMPLATE_VARS['data2'])?>">
            </div>
            <button class="btn btn-primary btn-block mb-1" type="submit">Give me stats</button>
        </form>
    </div>
    <!-- end col statsPeriod -->
    <div class="col-sm-8 col-lg-9 statsResult">
        <h4> Stat result: </h4>

        <?php if ($TEMPLATE_VARS['globalError']) { ?>
        <div class="globalError">
            <?=$TEMPLATE_VARS['globalError'] ?>
        </div>
        <?php } ?>

        <?php if ($TEMPLATE_VARS['controlCountText']) { ?>
        <p> <?=$TEMPLATE_VARS['controlCountText'] ?> </p>
        <?php } ?>


        <?php if ($TEMPLATE_VARS['stats']) { ?>
        <p> <?=$TEMPLATE_VARS['stats'] ?> </p>
        <?php } ?>
    </div>
</div>
<!--   end row statsRw -->
<div class="row tableRw">
    <?php if ($TEMPLATE_VARS['controale']) { ?>
    <table class="table table-responsive table-striped table-hover corectii-tabel">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nr. </th>
                <th scope="col">Denumire Unitate </th>
                <th scope="col">Id. Firma </th>
                <th scope="col">Data Control </th>
                <th class="d-none d-md-table-cell" scope="col">Data introd.</th>
                <th class="d-none d-md-table-cell" scope="col">Data update </th>
                <th scope="col">nr_ore </th>
                <th scope="col">Observatii </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($TEMPLATE_VARS['controale'] as $control) { ?>
            <tr>
                <th scope="row">
                    <a class='' data-toggle="tooltip" title="Edit Control" 
                        href="/control.php?page=add_control&id=<?=htmlspecialchars($control['id_control'])?>">
                        <?=htmlspecialchars($control['id_control'])?>
                    </a>
                </th>
                <td>
                    <a class='' data-toggle="tooltip" title="Afiseaza datele firmei." 
                        href="/firme.php?s=<?=htmlspecialchars($control['cid_firma'])?>&searchBy=id_firma">
                        <?=htmlspecialchars(Firma::getStaticDenumireFirma($control['cid_firma']))?>
                    </a>
                </td>
                <td>
                    <a class='' data-toggle="tooltip" title="Afiseaza toate controalele firmei." 
                        href="/control.php?s=<?=htmlspecialchars($control['cid_firma'])?>">
                        <?=htmlspecialchars($control['cid_firma'])?>
                    </a>
                </td>
                <td>
                    <?=htmlspecialchars($control['data_control'])?>
                </td>
                <td class="d-none d-md-table-cell">
                    <span>
                         <?=htmlspecialchars($control['data_start'])?>
                    </span>
                </td>
                <td class="d-none d-md-table-cell">
                    <span>
                        <?=htmlspecialchars($control['data_update'])?>
                    </span>
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
    <?php } else { ?>
        <p> <?="nothing found"?> </p>
    <?php } ?>
</div><!-- end row tablerw -->
