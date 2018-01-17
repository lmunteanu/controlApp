<?php
error_reporting(E_ALL);

require_once("../../application/classes/DBMySqlInterface.php");
require_once("../../application/classes/DBMySql.php");
require_once("../../application/classes/BaseObjectInterface.php");
require_once("../../application/classes/BaseObject.php");
require_once("../../application//functions.php");
require_once("../../application/classes/Firma.php");
//require_once("../../application/classes/User.php");

$i = 0; //variable to skip first iteration ... the file header

if (($file_handle = fopen("../uploads/final6-catagrafiexls.csv","r")) !== FALSE) {
   while (!feof($file_handle)) {
      
      $line_of_text = fgetcsv($file_handle,1024);
     
      if ($i < 1) { echo "Skipping header line <br />"; $i++; continue; } //required for skipping the header line
     
      $new_firma = new Firma();
      
      $new_firma->denumire_unitate=$line_of_text[0];
      $new_firma->adresa=$line_of_text[1];
      $new_firma->nr_strada=$line_of_text[2];
      $new_firma->cui=$line_of_text[3];
      $new_firma->cod_caen=$line_of_text[4];
      $new_firma->categorie=$line_of_text[5];
      $new_firma->persoana_contact=$line_of_text[6];
      $new_firma->adresa_pct_lucru=$line_of_text[7];
      $new_firma->nr_doc_inregistrare=$line_of_text[8];
      $new_firma->risc_actual=$line_of_text[9];
      $new_firma->telefon=$line_of_text[10];
      $new_firma->observatii=$line_of_text[11];
 //     $new_firma->data_start=convDate($line_of_text[11]);
   /*
      if (checkUser($new_article->user_id)) {   //checking if the user exists in the db
         echo "Saving: $new_article->title<br />";
         $new_article->save();
      }
      else {
         echo $new_article->title . ": Entry not saved, no user with id = " . $new_article->user_id . " found in DB!";
         var_dump($new_article);    
      }
   */
      echo "Saving: $new_firma->denumire_unitate<br />";
//    $new_firma->save(); //enable to save the import!
   }
   fclose($file_handle);
}
else {
   echo "file not found!";
}

function convDate($theDate) { //adjusting the date format, the date in the csv file is != db date format
   return date("Y-m-d H:i:s", strtotime($theDate));
}
/*
function checkUser($uid) {
      $userExists = new User();
      $userExists->getBy("id",$uid);
      
      if(!empty($userExists->id)) {
       return true;  //checked, the user exists
      }
      return false;  //user not found in the DB!
}
*/