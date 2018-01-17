<?php
function autoLoadClasses($className) {
   $classPath = APPLICATION_PATH . 'classes/' . $className . '.php';
   if (file_exists($classPath)) {
      require $classPath;
   }
}

function isPost() {
   return $_SERVER['REQUEST_METHOD'] === 'POST';   
}

function isDate($date) {
  $tempDate = explode('-', $date);
  return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
}



function isEmail($email) {
   if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      return true; //$email is a valid email address
   }
   return false;
}

function isValidPassword($passwd1,$passwd2) {
   if(!empty($passwd1) && ($passwd1 == $passwd2)) {
      if (strlen($passwd1) <= '6') {
         $passwordErr = "Your Password Must Contain At Least 8 Characters!";
         return array(false,$passwordErr);
      }
      elseif(!preg_match("#[0-9]+#",$passwd1)) {
         // ^(?=(?:\D*\d){2})[a-zA-Z0-9]*$
         $passwordErr = "Your Password Must Contain At Least 1 Number!";
         return array(false,$passwordErr);
      }
      elseif(!preg_match("#[A-Z]+#",$passwd1)) {
         $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
         return array(false,$passwordErr);
      }
      elseif(!preg_match("#[a-z]+#",$passwd1)) {
         $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
         return array(false,$passwordErr);
      }
   }
   elseif(!empty($passwd1)) {
      $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
      return array(false,$cpasswordErr);
   }
   return array(true,"");
}

function getUserIp()
{
   $theip = $_SERVER["REMOTE_ADDR"];
   
   if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
       $theip .= '('.$_SERVER["HTTP_X_FORWARDED_FOR"].')';
   }
   
   if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
       $theip .= '('.$_SERVER["HTTP_CLIENT_IP"].')';
   }
   
   return substr($theip, 0, 250);
}

function getNumberOfDays2($differenceFormat = '%a', $date_1 = null, $date_2 = null)
{
	if ($date_1 === null) { //call gresit
		return "error!"; 
	} elseif ($date_2 === null) { //daca nu ex a doua data
		$t2 = date("Y-m-d");
	} else { //celelalte situatii
		$t2 = $date_2;
	}
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($t2);
    if ($datetime1 > $datetime2) { return "imposibil"; }
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format($differenceFormat);
}

function getDateMysql($timestamp = null) {
   if ($timestamp === null){
      $timestamp = time();
   }
   return date("Y-m-d H:i:s", $timestamp);
}

function getOnlyTheDateMysql($timestamp = null) {
   if ($timestamp === null){
      $timestamp = time();
   }
   return date("Y-m-d", $timestamp);
}


function redirect($url) {
   header('Location: '. $url);
   exit();
}

function deg($var) {
   echo '<pre>';
   print_r($var);
   echo '</pre>';
}

function shortArticle($article, $length) {
    //daca articolul e mai lung de $length caractere
    if ((strlen($article) >= $length)) 
    {
    //generam string de $length caractere
        $short = substr($article, 0, $length);
        $i = $length;
         //daca caracterul $length nu este "space" si mai avem litere de parcurs
         while (($i < strlen($article)) && ($article[$i] !== " ")):
           
            $short = $short . $article[$i];
            $i++;
            
         endwhile; 
        
        return $short . '...';
    }
    return $article;
}

function shortArticle2($article, $length) {
   //daca articolul este mai lung mergi mai departe    
   if (strlen($article) >= $length) {
      //daca articolul !are lungime ~egala cu $length! si nu mai exista space        
      if ($pos=strpos($article,' ',$length)) {
         return substr($article,0,$pos) . "..."; 
      }
   }
   return $article;
}

function deleteFile($file) {
   if (file_exists($file)) 
   {
      if (!unlink("$file")) 
      {
         $_SESSION['globalError'] = "Error deleting $file";
      } 
      else 
      {
         $_SESSION['globalError'] = "File $file has been deleted";
      }
   }
   else
   {
      $_SESSION['globalError'] = "File $file has not been found!";
   }
}

function deleteFilesById($id) {
   $file = Media::getStaticImageUrl($id);
   $img = UPLOADS_DIR . $file;
   $thumb = THUMBNAILS_DIR . $file;
   deleteFile($img);
   deleteFile($thumb);
}

function resizeImage ($imagePath, $desiredWidth, $desiredHeight) {
   $imagick = new Imagick(realpath($imagePath));
   $currentWidth = $imagick->getImageWidth(); 
   $currentHeight = $imagick->getImageHeight(); 
   $ratio = $currentHeight / $currentWidth;
   $newHeight = round($currentHeight * $ratio);
   $imagick->resizeImage($desiredWidth, $newHeight, Imagick::FILTER_UNDEFINED, 1);
   $y = round(($newHeight - $desiredHeight) / 2);
   $imagick->cropImage($desiredWidth, $desiredHeight, 0, $y);
   /*
   print_r($currentWidth);
   echo("\n");
   print_r($currentHeight);
   print_r($ratio);
   exit;
   */
   $imagick->writeImage(realpath($imagePath));
}

function resizeImg ($path, $dw, $dh) {
   $imagick = new Imagick(realpath($path));
   $cw = $imagick->getImageWidth(); 
   $ch = $imagick->getImageHeight(); 
   $ratio = $cw / $ch;
   if (($cw > $dw) && ($ch > $dh)) //se face si resize si crop (daca destul de lata si inalta)
   {
      if ($dw > $dh) //desired image format wide
      {
         echo "calcul pt imagini late" . "<br>";
         if ($ratio) //nu conteaza! trebuia sa fie pt > 1
         {
            // w mare h mic
            echo "LAT ratio bigger then 1 = " . $ratio . "<br>";
            $nw = $dw;
            //$nh = round(($ch / $cw)*$dw); //echivalent
            $nh = round(($ch * $dw) / $cw);
            $x = 0;
            $y = round(($nh - $dh) / 2);
         } 
         else //daca modificam inaltimea ajungem sa fie prea ingusta ...
         {
            // h mare w mic
            echo "INALT ratio smaller then 1 = " . $ratio . "<br>";
            $nh = $dh;
            $nw = round(($cw * $dh) / $ch);
            //$x = round(($cw - $dw) / 2);
            $x = 0;
            $y = round(($nh - $dw) / 2);
         }
      }
      elseif ($dw == $dh)  //desired image format patrat
      {
         echo "calcul pt imagini patrate" . "<br>";
         if ($cw > $ch) {
            echo "lata" . "<br>";
            $nh = $dh;
            $nw = round(($cw * $dh) / $ch);
            $y = 0;
            $x = round(($nw - $dw) / 2);
         }
         else
         {
            echo "inalta" . "<br>";
            $nw = $dw;
            $nh = round(($ch * $dw) / $cw);
            $x = 0;
            $y = round(($nh - $dh) / 2);
         }
      }
      else //desired image format portrait
      {
         echo "calcul pt imagini inalte tip banner vertical" . "<br>";
        // echo "inca neimplementat";
        // exit;
         $nh = $dh;
         $nw = round(($cw * $dh) / $ch);
         $y = 0;
         $x = round(($nw - $dw) / 2);
      }
      $imagick->resizeImage($nw, $nh, Imagick::FILTER_UNDEFINED, 1);
      echo "running ..." . "<br>";
      echo "cut " . $dw ."x" . $dh . " from " . $x . "x" . $y ."<br>";
   }
   else //daca se face doar crop (nu facem niciun resize)
   {
      echo "dont do a thing!" . "<br>";
      echo "but maibe its better to do something about it";
      $nw = 0; $nh = 0;
      $dw = $cw < $dw ? $cw : $dw; //modificam dw si dh astfel sa ne incadram in maxime
      $dh = $ch < $dh ? $ch : $dh; 
      $x = 0;
      $y = round(($ch - $dh) / 2);
      echo "cut " . $dw ."x" . $dh . " from " . $x . "x" . $y ."<br>";
   }
   $imagick->cropImage($dw, $dh, $x, $y);
   $imagick->writeImage(realpath($path));
   echo "cw = " . $cw . " and ch = " . "$ch" . "<br>";
   echo "dw = " . $dw . " and dh = " . "$dh" . "<br>";
   echo "nw = " . $nw . " and nh = " . "$nh" . "<br>";
  // exit;
}