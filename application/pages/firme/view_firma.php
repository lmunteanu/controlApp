<?php

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$new_firma = new Firma($id);

$TEMPLATE_VARS['firma'] = $new_firma;
$TEMPLATE_VARS['templatePath'] = 'view_firma.php';