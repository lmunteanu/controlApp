<?php
error_reporting(E_ALL);

require_once("../../application/classes/DBMySqlInterface.php");
require_once("../../application/classes/DBMySql.php");
require_once("../../application/classes/BaseObjectInterface.php");
require_once("../../application/classes/BaseObject.php");
require_once("../../application/classes/Article.php");
require_once("../../application/classes/User.php");

$i = 0; //variable to skip first iteration ... the file header

if (($file_handle = fopen("../uploads/articles-simple.csv","r")) !== FALSE) {
   while (!feof($file_handle)) {
      
      $line_of_text = fgetcsv($file_handle,1024);
     
      if ($i < 1) { echo "Skipping header line <br />"; $i++; continue; } //required for skipping the header line
     
      $new_article = new Article();
      
      $new_article->user_id=$line_of_text[0];
      $new_article->title=$line_of_text[1];
      $new_article->description=$line_of_text[2];
      $new_article->date_created=convDate($line_of_text[3]);
      $new_article->date_published=convDate($line_of_text[4]);
      $new_article->date_updated=convDate($line_of_text[5]);
      $new_article->status=$line_of_text[6];
   
      if (checkUser($new_article->user_id)) {   //checking if the user exists in the db
         echo "Saving: $new_article->title<br />";
         $new_article->save();
      }
      else {
         echo $new_article->title . ": Entry not saved, no user with id = " . $new_article->user_id . " found in DB!";
         var_dump($new_article);    
      }
   }
   fclose($file_handle);
}
else {
   echo "file not found!";
}

function convDate($theDate) { //adjusting the date format, the date in the csv file is != db date format
   return date("Y-m-d H:i:s", strtotime($theDate));
}

function checkUser($uid) {
      $userExists = new User();
      $userExists->getBy("id",$uid);
      
      if(!empty($userExists->id)) {
       return true;  //checked, the user exists
      }
      return false;  //user not found in the DB!
}
