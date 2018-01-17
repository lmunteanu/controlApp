<?php

$validationMessage = '';
//$actionMessage = '';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$idFirma =  isset($_GET['idFirma']) ? $_GET['idFirma'] : null;
$actionMessage = isset($_GET['actionMessage']) ? $_GET['actionMessage'] : null;

//adds the control data in the object
$new_control = new Control($id);
/*
UPDATE `smart_blog`.`firma` SET `data_sfarsit` = '2017-08-08 00:00:00' WHERE `firma`.`id` =1;
*/
//autocompleter for adding a control easy (default values)
if ($idFirma) { 
    $new_control->cid_firma = $idFirma; 
    $new_control->data_control = getOnlyTheDateMysql();
    $new_control->nr_ore = 3;
}

//begin the post work    
if (isPost()) {
    
    $new_control->cid_firma = $_POST['firma-id_firma'];
    $new_control->data_control = $_POST['firma-data_control'];
    //$new_control->data_start = $_POST['firma-data_start'];
    //$new_control->data_update = $_POST['firma-data_update'];
    $new_control->nr_ore = $_POST['firma-nr_ore'];
    $new_control->observatii = $_POST['firma-observatii'];

    
    if (empty($_POST['firma-id_firma'])) { //check if ... is null
      $validationMessage = 'Controlul trebuie sa aiba un id de firma.';
   } elseif (empty($_POST['firma-data_control'])) { //check if ... is null
      $validationMessage = 'Firma trebuie sa aiba data';
   } else { 
       
    $actionMessage = $new_control->id_control ? 'Controlul a fost modificat. ' : 'Control salvat. ';
    
    $new_control->observatii = $_POST['firma-observatii'];
    
   // $new_firma->data_start = getDateMysql();
    $new_control->save();

    // redirect('/control.php?page=add_control&id=' . $new_control->id_control . "&actionMessage=" . $actionMessage);
    redirect('/control.php?s=' . $new_control->cid_firma . "&actionMessage=" . $actionMessage);
   }
}

// $TEMPLATE_VARS['actionMessage'] = $actionMessage;
$TEMPLATE_VARS['cId'] = $id;
$TEMPLATE_VARS['validationMessage'] = $validationMessage;
$TEMPLATE_VARS['controale'] = $new_control;
$TEMPLATE_VARS['templatePath'] = 'add_control.php';