<?php

require_once 'application/init.php';

session_start();

$TEMPLATE_VARS = [
   'mainTemplateFile' => 'components/index.php',
];

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (!User::isLogged() && !in_array($page, array('login', 'register'))) {
   redirect('/admin.php?page=login');
}

$filePath = APPLICATION_PATH . 'pages/admin/' . $page . '.php';
if (file_exists($filePath)) { 
   require_once $filePath; 
} else {
   $TEMPLATE_VARS['templatePath'] = 'components/not-found.php';
}

$TEMPLATE_VARS['globalError'] = isset($_SESSION['globalError']) ? $_SESSION['globalError'] : null;
unset ($_SESSION['globalError']);
$TEMPLATE_VARS['loggedUser'] = User::getLogged();

require_once(ADMIN_TEMPLATES_PATH . $TEMPLATE_VARS['mainTemplateFile']);