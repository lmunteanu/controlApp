<?php

require_once('application/init.php');

session_start();
$_SESSION['came_from'] = $_SERVER['REQUEST_URI'];

$TEMPLATE_VARS = [];

$TEMPLATE_VARS['mainTemplateFile'] = 'components/index.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (!User::isLogged() && !in_array($page, array('login', 'register'))) {
   redirect('/admin.php?page=login');
}

if ($page === 'ajax') {
   $action = $_GET['action'];
   $filePath = APPLICATION_PATH . 'pages/' . $page . '/' . $action . '.php';
} else {
   $filePath = APPLICATION_PATH . 'pages/control/' . $page . '.php';
}

if (file_exists($filePath)) { 
   require_once $filePath; 
} else {
   $TEMPLATE_VARS['templatePath'] = '../not-found.php';
}

$TEMPLATE_VARS['globalError'] = isset($_SESSION['globalError']) ? $_SESSION['globalError'] : null;
unset ($_SESSION['globalError']);
$TEMPLATE_VARS['loggedUser'] = User::getLogged();

if ($page !== 'ajax') {
  require_once(CONTROL_TEMPLATES_PATH . $TEMPLATE_VARS['mainTemplateFile']);
}
