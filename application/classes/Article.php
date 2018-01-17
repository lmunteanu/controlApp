<?php

class Article extends BaseObject {
   public static $TABLE_NAME = 'articles';
   
   public $id;
   public $user_id;
   public $title;
   public $description;
   public $date_created;
   public $date_published;
   public $date_updated;
   public $status;
   
   public function __construct($id = null) 
   {
      if ($id) {
         $this->getBy('id', $id);
      }
   }
   
   public function getBy($key,$value) 
   {
      $data = parent::getBy($key,$value);
       if (count($data) > 0) {
          $articleData = $data[0];
          
          $this->id = $articleData["id"];
          $this->user_id = $articleData["user_id"];
          $this->title = $articleData["title"];
          $this->description = $articleData["description"];
          $this->date_created = $articleData["date_created"];
          $this->date_published = $articleData["date_published"];
          $this->date_updated = $articleData["date_updated"];
          $this->status = $articleData["status"];
      }
   }
   protected function update() 
   {
         $titleEscaped = $this->escape($this->title);
         $desc = $this->escape($this->description);
         $this->date_updated = getDateMysql();
         $query = "UPDATE `".static::$TABLE_NAME."` 
                   SET user_id = '$this->user_id',
                       title = '$titleEscaped',                      
                       description = '$desc',
                       date_updated = '$this->date_updated',
                       date_published = '$this->date_published',
                       status = '$this->status'
                   WHERE id=($this->id)
                  ";      
         $db = self::getDBConnection();
         $result = $db->query($query);
   }
   
    public function save() 
    {
        $this->date_updated = getDateMysql();
        parent::save();
    }
   
    protected function insert() 
    {
      $titleEscaped = $this->escape($this->title);
      $desc = $this->escape($this->description);
      $this->date_created = getDateMysql();
      $query = "INSERT INTO `".static::$TABLE_NAME."` 
                SET user_id = '{$this->user_id}',
                    title = '$titleEscaped',                      
                    description = '$desc',
                    date_created = '$this->date_created',
                    date_published = '$this->date_published',
                    status = '$this->status'
             ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
      $this->id = $db->getLastInsertId();
   }
   
   public function getImageUrl() 
   {
      $media = new Media();
      $media->getBy('article_id', $this->id);
      return ((isset($media)) && !empty($media->id)) ?
      //? '/public/uploads/' . $media->name 
      $media->name :
      false;
   }
}