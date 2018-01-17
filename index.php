<?php

//error_reporting(E_ALL); //exista si in init.php

require_once('application/init.php');

session_start();

$TEMPLATE_VARS = [];

$TEMPLATE_VARS['mainTemplateFile'] = 'components/index.php';
// echivalent
// $TEMPLATE_VARS = [
//    'mainTemplateFile' => 'components/index.php',
// ];

$page = isset($_GET['page']) ? $_GET['page'] : 'blog';

if ($page === 'ajax') 
{
   $action = $_GET['action'];
   $filePath = APPLICATION_PATH . 'pages/' . $page . '/' . $action . '.php';
} else {
   $filePath = APPLICATION_PATH . 'pages/blog/' . $page . '.php';
}

//deg($filePath);
//$filePath = APPLICATION_PATH . 'pages/blog/' . $page . '.php';

if (file_exists($filePath)) 
{ 
   require_once $filePath; 
} else {
   echo 'file not found';
};

$TEMPLATE_VARS['globalError'] = isset($_SESSION['globalError']) ? $_SESSION['globalError'] : null;
unset ($_SESSION['globalError']);


if ($page !== 'ajax') {
  //require_once BLOG_TEMPLATES_PATH.$TEMPLATE_VARS['mainTemplateFile'];
  require_once(PUBLIC_TEMPLATES_PATH . $TEMPLATE_VARS['mainTemplateFile']);
}

//require_once(PUBLIC_TEMPLATES_PATH . $TEMPLATE_VARS['mainTemplateFile']);