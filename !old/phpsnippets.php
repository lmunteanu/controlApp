<?php

function thumbnail($path, $new_w, $new_h)
{
    $focus = 'center';
    $image = new Imagick(realpath($path));
    $w = $image->getImageWidth();
    $h = $image->getImageHeight();

    if ($w > $h) {
        $resize_w = $w * $new_h / $h;
        $resize_h = $new_h;
    }
    else {
        $resize_w = $new_w;
        $resize_h = $h * $new_w / $w;
    }
    
    $image->resizeImage($resize_w, $resize_h, Imagick::FILTER_LANCZOS, 0.9);

    switch ($focus) {
        case 'northwest':
            $image->cropImage($new_w, $new_h, 0, 0);
            break;

        case 'center':
            $image->cropImage($new_w, $new_h, ($resize_w - $new_w) / 2, ($resize_h - $new_h) / 2);
            break;

        case 'northeast':
            $image->cropImage($new_w, $new_h, $resize_w - $new_w, 0);
            break;

        case 'southwest':
            $image->cropImage($new_w, $new_h, 0, $resize_h - $new_h);
            break;

        case 'southeast':
            $image->cropImage($new_w, $new_h, $resize_w - $new_w, $resize_h - $new_h);
            break;
    }
    $image->writeImage(realpath($path));
    
}

function resizeImgxxx ($path, $dw, $dh) {
   $imagick = new Imagick(realpath($path));
   $cw = $imagick->getImageWidth(); 
   $ch = $imagick->getImageHeight(); 
   $ratio = $cw / $ch;
   if (($cw > $dw) && ($ch > $dh)) //se face si resize si crop
   {
      if ($ratio > 10) 
      {
         echo "ratio bigger then 1 = " . $ratio . "<br>";
         //$nw = $dw;
         //$r = $dw / $cw;
         //$nh = round($ch * $r);
         $nh = $dh;
         $r = $dh / $ch;
         $nw = round($cw * $r);
         $x = round(($nw - $dw) / 2);
         $y = 0;
      } 
      else 
      {
         echo "ratio smaller then 1 = " . $ratio . "<br>";
         $nw = $dw;
         $r = $dw / $cw;
         $nh = round($ch * $r);
         $x = 0;
         $y = round(($nh - $dh) / 2);
      }
   $imagick->resizeImage($nw, $nh, Imagick::FILTER_UNDEFINED, 1);
   echo "running ..." . "<br>";
   echo "cut " . $dw ."x" . $dh . " from " . $x . "x" . $y ."<br>";
   } 
   else //se face doar crop
   {
      echo "dont do a thing!" . "<br>";
      $nw = 0; $nh = 0;
      $dw = $cw < $dw ? $cw : $dw;
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
   
}