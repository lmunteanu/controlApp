<?php
//### pages firme home ###

$firmePerPage = ITEMS_PER_PAGE;

$p = isset($_GET['p']) ? $_GET['p'] : 1;
$sortBy = isset($_GET['sortby']) ? $_GET['sortby'] : '';
$mod = isset($_GET['mod']) ? $_GET['mod'] : '';

//$ss = isset($_GET['s']) ? $_GET['s'] : ''; //escape string to be added!!!

//quick escape fix!
$conn = new DBMySql();
$conn->connect();
$searchBy = isset($_GET['searchBy']) ? $_GET['searchBy'] : 'denumire_unitate';
$s = isset($_GET['s']) ? $conn->escape($_GET['s']) : '';
//end quick escape fix!

$limit = ($p - 1) * $firmePerPage . ',' . $firmePerPage;

$sortWord = ""; //word used to sort list
if (!$mod) { $mod = "ASC"; }

if ($sortBy == "DataControl") {
      $sortWord = "data_control";
   } elseif ($sortBy == "RiscActual") {
      $sortWord = "risc_actual";
   } elseif ($sortBy == "AdresaPunctLucru") {
      $sortWord = "adresa_pct_lucru";
   } elseif ($sortBy == "Id") {
      $sortWord = "id_firma";
   } elseif ($sortBy == "CAEN") {
      $sortWord = "cod_caen";
   } else {
      $sortWord = "denumire_unitate"; //default sort
}

if (!$s) //if not a search
{
   //get number of articles when not searching
   $FirmeCount = Firma::getCount("WHERE 1");
   // $firme = Firma::getAllJoin(sprintf(
   //    "ORDER BY `%s` %s LIMIT %s", $sortWord, $mod, $limit
   //    "f right JOIN `control` c1 ON (f.id_firma = c1.id_firma) ORDER BY `%s` %s LIMIT %s",
   // ));
   // get all with the last control date
    $firme = Firma::getAll(sprintf(
      "f LEFT JOIN `control` c 
      ON (f.id_firma = c.cid_firma) 
      WHERE data_control is NULL 
         OR data_control = (
            SELECT MAX(data_control)
            FROM `control` c2
            WHERE (c2.cid_firma = f.id_firma)
         )
      ORDER BY %s %s LIMIT %s
      ",
      $sortWord, 
      $mod, 
      $limit
   ));
   
}
else //if this is a search or a sort
{
   //get number of articles when search is on
   $FirmeCount = Firma::getCount(sprintf(
      "WHERE `%s` LIKE '%%%s%%'",
      $searchBy,
      $s
   ));
   /*
      "WHERE `%s` LIKE '%%%s%%' ORDER BY `%s` DESC LIMIT %s",
      
      "f right JOIN `control` c1 ON (f.id_firma = c1.id_firma) 
      WHERE `%s` LIKE '%%%s%%' ORDER BY `%s` %s LIMIT %s",
   */
   $nsearchBy = "f." . $searchBy;
   $firme = Firma::getAll(sprintf(
      "f LEFT JOIN `control` c 
      ON (f.id_firma = c.cid_firma) 
      WHERE %s LIKE '%%%s%%'
      AND (data_control is NULL 
            OR 
            data_control = (
            SELECT MAX(data_control)
            FROM `control` c2
            WHERE (c2.cid_firma = f.id_firma)
            )
         )
      ORDER BY `%s` %s LIMIT %s
      ",
      $nsearchBy,
      $s, 
      $sortWord,
      $mod,
      $limit
   ));
}

//get number of pages
   $FirmeCount = $FirmeCount < 1 ? 1 : $FirmeCount;
   $totalPages = ceil($FirmeCount / $firmePerPage);

//avoid error if "the page is not number" or "smaller then 1" or "$p larger then total pages"
if ((!is_numeric($p)) || (intval($p) < 1) || ((intval($p) > intval($totalPages)))) { 
    $_SESSION['globalError'] = 'error: Page Not Found!';
    redirect('/firme.php');
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
// paginator! changes
// php for ($i = 1; $i <= $TEMPLATE_VARS['totalPages']; $i++) {

$TEMPLATE_VARS['firme'] = $firme;
$TEMPLATE_VARS['totalPages'] = $totalPages;
$TEMPLATE_VARS['currentPage'] = $p;
$TEMPLATE_VARS['from'] = $from;
//$TEMPLATE_VARS['to'] = $to;
$TEMPLATE_VARS['to'] = ($to < $totalPages ? $to : $totalPages);
$TEMPLATE_VARS['prevPage'] = $p - 1;
$TEMPLATE_VARS['nextPage'] = isset($_GET['p']) ? $p + 1: 2;
$TEMPLATE_VARS['searchBy'] = isset($_GET['searchBy']) ? '&searchBy=' . $_GET['searchBy'] : '';
$TEMPLATE_VARS['searchText'] = isset($_GET['s']) ? '&s=' . $_GET['s'] : '';
$TEMPLATE_VARS['sortby'] = isset($_GET['sortby']) ? '&sortby=' . $_GET['sortby'] : '';
$TEMPLATE_VARS['templatePath'] = 'home.php';