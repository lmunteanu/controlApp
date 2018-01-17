<?php
//### pages control home ###

$controalePerPage = ITEMS_PER_PAGE;

$actionMessage = isset($_GET['actionMessage']) ? $_GET['actionMessage'] : null;
$sortBy = isset($_GET['sortby']) ? $_GET['sortby'] : '';
$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
$p = isset($_GET['p']) ? $_GET['p'] : 1;

$ss = isset($_GET['s']) ? $_GET['s'] : ''; //escape string to be added!!!
//quick escape fix!
$conn = new DBMySql();
$conn->connect();
$s = isset($_GET['s']) ? $conn->escape($_GET['s']) : '';
$searchBy = isset($_GET['searchBy']) ? $_GET['searchBy'] : 'cid_firma';

$limit = ($p - 1) * $controalePerPage . ',' . $controalePerPage;

$sortWord = ""; //word used to sort list
if (!$mod) { $mod = "DESC"; }

if ($sortBy == "IdControl") {
      $sortWord = "id_control";
   } elseif ($sortBy == "DataControl") {
      $sortWord = "data_control";
   } elseif ($sortBy == "IdFirma") {
      $sortWord = "cid_firma";
   } else {
      $sortWord = "data_control"; //default sort
}


if (!$s) //if not a search
{
   //get number of articles when not searching
   $controlCount = Control::getCount("WHERE 1");
   $controale = Control::getAll(sprintf(
      "ORDER BY `%s` %s LIMIT %s", 
      $sortWord,
      $mod,
      $limit
   ));

} 
else //if this is a search
{
   //get number of articles when search is on
   $controlCount = Control::getCount(sprintf(
      "WHERE `$searchBy` LIKE '%%%s%%'",
      $searchBy,
      $s
   ));
   
   $controale = Control::getAll(sprintf(
      "WHERE `%s` LIKE '%%%s%%' ORDER BY `%s` %s LIMIT %s",
      $searchBy,
      $s,
      $sortWord,
      $mod,
      $limit
   ));
}

//get number of pages
   $controlCount = $controlCount < 1 ? 1 : $controlCount; //fix 0 page
   $totalPages = ceil($controlCount / $controalePerPage);

//avoid error if "the page is not number" or "smaller then 1" or "$p larger then total pages"
if ((!is_numeric($p)) || (intval($p) < 1) || ((intval($p) > intval($totalPages)))) { 
    $_SESSION['globalError'] = 'error: Page Not Found!';
    redirect('/control.php');
} 

if ($p <= 3) { 
   $from = 1; $to = 5; 
} elseif ($p >= $totalPages - 5) { 
   $from = $totalPages - 5; 
   $to = $totalPages; 
} else { 
   $from = $p - 2; 
   $to = $p + 2; 
}

$TEMPLATE_VARS['controale'] = $controale;
$TEMPLATE_VARS['actionMessage'] = $actionMessage;
$TEMPLATE_VARS['totalPages'] = $totalPages;
$TEMPLATE_VARS['currentPage'] = $p;
$TEMPLATE_VARS['from'] = $from;
$TEMPLATE_VARS['to'] = ($to < $totalPages ? $to : $totalPages);
$TEMPLATE_VARS['prevPage'] = $p - 1;
$TEMPLATE_VARS['nextPage'] = isset($_GET['p']) ? $p + 1 : 2;
$TEMPLATE_VARS['searchBy'] = isset($_GET['searchBy']) ? '&searchBy=' . $_GET['searchBy'] : '';
$TEMPLATE_VARS['searchText'] = isset($_GET['s']) ? '&s=' . $_GET['s'] : '';
$TEMPLATE_VARS['sortby'] = isset($_GET['sortby']) ? '&sortby=' . $_GET['sortby'] : '';
$TEMPLATE_VARS['templatePath'] = 'home.php';