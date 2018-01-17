<?php

$validationMessage = '';
//$actionMessage = '';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$actionMessage = isset($_GET['actionMessage']) ? $_GET['actionMessage'] : null;

$new_firma = new Firma($id);

if (isPost()) {
    
    $new_firma->denumire_unitate = $_POST['firma-denumire'];
    $new_firma->adresa = $_POST['firma-adresa'];
    $new_firma->nr_strada = $_POST['firma-nr_strada'];
    $new_firma->cui = $_POST['firma-cui'];
    $new_firma->cod_caen = $_POST['firma-caen'];
    //$new_firma->categorie = $_POST['firma-categorie'];  //nu se va modifica!
    $new_firma->persoana_contact = $_POST['firma-contact'];
    $new_firma->adresa_pct_lucru = $_POST['firma-adresa_pct_lucru'];
    $new_firma->nr_doc_inregistrare = $_POST['firma-nr_doc'];
    $new_firma->risc_actual = $_POST['firma-risc'];
    $new_firma->ore_control = $_POST['firma-ore'];
    $new_firma->telefon = $_POST['firma-telefon'];
    $new_firma->observatii = $_POST['firma-observatii'];
    
    if (empty($_POST['firma-denumire'])) { //check if denumire firma is null
      $validationMessage = 'Firma trebuie sa aiba un nume.';
   } elseif (empty($_POST['firma-cui'])) { //check if cui is null
      $validationMessage = 'Firma trebuie sa aiba un CUI';
   } else { 
       
    $actionMessage = $new_firma->id_firma ? 'Firma a fost modificata. ' : 'Firma salvata. ';
    
   // $new_firma->data_start = getDateMysql();
//   var_dump($new_firma);
//   die;
    $new_firma->save();

    redirect('/firme.php?page=add_firma&id=' . $new_firma->id_firma . "&actionMessage=" . $actionMessage);
    
   }
}

$TEMPLATE_VARS['actionMessage'] = $actionMessage;
$TEMPLATE_VARS['validationMessage'] = $validationMessage;
$TEMPLATE_VARS['firma'] = $new_firma;
$TEMPLATE_VARS['templatePath'] = 'add_firma.php';