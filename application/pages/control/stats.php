<?php

$totalOreControl = 0;
$controlCountText = 0;
$nrZile = 0;
$firstDay = date('Y-m-01');
//$tenDaysAgo = date('Y-m-d', strtotime('-10 days'));
//$lastDay = date('Y-m-t');
$data1 = isset($_POST['data1']) ? $_POST['data1'] : $firstDay;
$data2 = isset($_POST['data2']) ? $_POST['data2'] : getOnlyTheDateMysql();

$controale = "";

//if (isPost()) {
   if (!isDate($data1) || !isDate($data2)) //if not a search
   {
      //get number of articles when not searching
     $_SESSION['globalError'] = "error: invalid date!";
   } 
   else //if this is a search
   {
      $controale = Control::getAll(sprintf(
         "WHERE (data_control BETWEEN '%s' AND '%s') ORDER BY `data_control` ASC LIMIT 100",
         $data1,
         $data2
      ));
      $controlCount = count($controale);
      if ($controlCount > 100) {  
          $controlCountText = 'error: ' . $controlCount . ' results found! LIMIT is 100'; 
      } else { 
          $controlCountText = $controlCount . ' controale gasite!'; 
      }
      
      //deg($controale);
      // die;
      
      $nrZile = getNumberOfDays2("%a days ", $data1, $data2);
      $totalOreControl = array_sum(array_map(function($var) { return $var['nr_ore']; }, $controale));
   }
//}

$TEMPLATE_VARS['controlCountText'] = $controlCountText;
$TEMPLATE_VARS['data1'] = $data1;
$TEMPLATE_VARS['data2'] = $data2;
$TEMPLATE_VARS['stats'] = "Nr Zile " . $nrZile . " - Ore lucru: " . $totalOreControl . " - incasari: " . $totalOreControl * CONTROL_PRICE . " lei";
$TEMPLATE_VARS['controale'] = $controale;
$TEMPLATE_VARS['templatePath'] = 'stats.php';