<?php
class Media extends BaseObject {
   public static $TABLE_NAME = 'media';
     
      public $id;
      public $article_id;
      public $name;
      
   public function getBy($key, $value) {
      $data = parent::getBy($key,$value);
      if (count($data) > 0) {
         $mediaData = $data[0];
          
         $this->id = $mediaData["id"];
         $this->article_id = $mediaData["article_id"];
         $this->name = $mediaData["name"];
      }
   }
   
   public static function getStaticImageUrl($aid) {
      $query = "SELECT `name` FROM `".static::$TABLE_NAME."` WHERE `article_id`=($aid)";   
      // echo $query;           
      $db = self::getDBConnection();
      $result = $db->query($query);
      //return !empty($result) ? 'public/uploads/' . $result[0]['name'] 
      return !empty($result) 
      ? $result[0]['name'] 
      : '';
   }
   
   public static function getAllLinks() {
      $query = "SELECT `name` FROM `".static::$TABLE_NAME."` WHERE 1";   
      // echo $query;           
      $db = self::getDBConnection();
      $result = $db->query($query);
      //return !empty($result) ? 'public/uploads/' . $result[0]['name'] 
      return !empty($result) 
      ? json_encode($result)
      : '';
   }

   public static function deleteByArticleId($id) {
      $query = "DELETE FROM `".static::$TABLE_NAME."` " . "WHERE `article_id`=$id";
      if ($id >= 1) {
         $db = self::getDBConnection();
         $result = $db->query($query);
      }
   }
   
   protected function update() {
        $nameEscaped = $this->escape($this->name);
        $query = "UPDATE `".static::$TABLE_NAME."` 
                  SET article_id = '$this->article_id',
                  name = '$nameEscaped'                      
                  WHERE id = ($this->id)
                  ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
   }
   
   protected function insert() {
        $nameEscaped = $this->escape($this->name);
        $this->date_created = getDateMysql();
        $query = "INSERT INTO `".static::$TABLE_NAME."` 
                  SET  article_id = '$this->article_id', 
                  name = '$nameEscaped'
                 ";      
        $db = self::getDBConnection();
        $result = $db->query($query);
        $this->id = $db->getLastInsertId();
   }
   
}
