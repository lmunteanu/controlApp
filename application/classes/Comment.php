<?php

class Comment extends BaseObject {
   public static $TABLE_NAME = 'comments';
   
   public $id;
   public $article_id;
   public $name;
   public $email;
   public $website;
   public $message;
   public $date_created;
   public $status;
   
   public function __construct($id = null) {
      if ($id) {
         $this->getBy('id', $id);
      }
   }
   
   public function getBy($key,$value) 
   {
      $data = parent::getBy($key,$value);
       if (count($data) > 0) {
          $userData = $data[0];
          
          $this->id = $userData["id"];
          $this->article_id = $userData["article_id"];
          $this->name = $userData["name"];
          $this->email = $userData["email"];
          $this->website = $userData["website"];
          $this->message = $userData["message"];
          $this->date_created = $userData["date_created"];
          $this->status = $userData["status"];
      }
   }
   protected function update() {
      $query = "UPDATE `".static::$TABLE_NAME."` 
                SET article_id = '$this->article_id',
                   name = '$this->name',
                   email = '$this->email',                      
                   website = '$this->website',
                   message = '$this->message',
                   date_created = '$this->date_created',
                   status = '$this->status'
                WHERE id=($this->id)
               ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
   }
   
    protected function insert() 
    {
      $nameEscaped = $this->escape($this->name);
      $emailEscaped = $this->escape($this->email);
      $commentEscaped = $this->escape($this->message);
      $query = "INSERT INTO `".static::$TABLE_NAME."` 
               SET article_id = '$this->article_id',
                   name = '$this->name',
                   email = '$this->email',                      
                   website = '$this->website',
                   message = '$this->message',
                   date_created = '$this->date_created',
                   status = '$this->status'
               ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
      $this->id = $db->getLastInsertId();
   }
   
}