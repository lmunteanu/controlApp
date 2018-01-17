<?php

$errorMessage = '';
$action = '';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

//$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$my_article = new Article($id);

if ($my_article->id && $my_article->user_id != User::getLogged()->id) {
   $_SESSION['globalError'] = 'no access to this area!';
   redirect('/admin.php');
}

if (isPost()) {

   $action = $my_article->id ? 'Article has been updated. ' : 'Article has been added. ';
   
   $my_article->title = $_POST['article-title'];
   $my_article->description = $_POST['content'];
   
   if (empty($_POST['article-title'])) { //check if username is null
      $errorMessage = 'Article Title can\'t be empty';
   } elseif (empty($_POST['content'])) { //check if password is null
      $errorMessage = 'Article content can\'t be empty';
   } else { //totul e ok se poate face insert/update
    //if "checked" deleteImg delete image and remove db image link
      if(isset($_POST['deleteImg']) && $_POST['deleteImg'] == 'Yes') 
         {
            if($my_article->id) {
               if(Media::getStaticImageUrl($my_article->id)) {
                  deleteFilesById($my_article->id);
                  Media::deleteByArticleId($my_article->id);
               }
               
            }
         } 
     
     //begin media upload if all ok
      if (!empty($_FILES['media']['name'])) 
      {
         if(!empty($_FILES['media']['error'])) 
         {
            $_SESSION['globalError'] = "errors on upload occurred";
            redirect('/admin.php');
         }
        
         list($filename, $extension) = explode('.', basename($_FILES['media']['name']));
         
         $imageName = md5($filename . time() . rand(9999, 99999)) . "." . $extension;
         
        // $uploadDirPath = PUBLIC_DIR . '/uploads/';
        // web_dir . UPLOADS_DIR is /home/ubuntu/workspace/application/../public/uploads/
        // web_dir beeing ../ or /home/ubuntu/workspace/application/../
        
         $uploadDirPath = WEB_DIR . UPLOADS_DIR;
         $thumbnailPath = WEB_DIR . THUMBNAILS_DIR;
         $uploadFilePath = $uploadDirPath . $imageName;
         $uploadThumbPath = $thumbnailPath . $imageName;

         //$uploadFilePath = $uploadDirPath . basename($_FILES['media']['name']);
         
         if (!move_uploaded_file($_FILES['media']['tmp_name'], $uploadFilePath)) 
         {
            $_SESSION['globalError'] = 'Unable to upload file';
            redirect('/admin.php');
         }
         if (!copy ($uploadFilePath, $uploadThumbPath )) 
         {
            $_SESSION['globalError'] = 'Unable to copy file';
         }
         
         resizeImg ($uploadFilePath, 950, 260);
         resizeImg ($uploadThumbPath, 250, 250);
         
         //begin delete image when new image is uploaded
         if($my_article->id) 
         {
            if(Media::getStaticImageUrl($my_article->id)) 
            {
               deleteFilesById($my_article->id);
           
            }
         }
      }
      //begin insert/update   
      $my_article->title = $_POST['article-title'];   //posibil dupe
      $my_article->description = $_POST['content'];   //posibil dupe
   
      if ($_POST['status'] === 'published' && $my_article->status !== 'published') {
            $my_article->date_published = getDateMysql();
      }
      
      $my_article->user_id = $_SESSION['loggedUserId'];
      $my_article->status = $_POST['status'];
      $my_article->save();
      
      if(isset($imageName)) {
         $media = new Media();
         $media->getBy('article_id', $my_article->id);
         if (!isset($media->id) || empty($media->id)) {
            $media->article_id = $my_article->id;
         }
         $media->name = $imageName;
         $media->save();
      }
      
      redirect('/admin.php?page=article&id=' . $my_article->id . "&action=" . $action);
   }
}
//deg($my_article);



$TEMPLATE_VARS['actionMessage'] = $action;
$TEMPLATE_VARS['validationMessage'] = $errorMessage;
$TEMPLATE_VARS['article'] = $my_article;
$TEMPLATE_VARS['templatePath'] = 'article.php';