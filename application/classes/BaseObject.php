<?php
class BaseObject implements BaseObjectInterface {
   protected static $DB;
   public static $TABLE_NAME = '';
   
   public static function getAll($cond = '') {
      $query = "SELECT * FROM `".static::$TABLE_NAME."` " . $cond;
      $db = self::getDBConnection();
      $result = $db->query($query);
      
      return $result;
   }
   
   // public static function getAllJoin($cond = '') {
   //    $query = "SELECT * FROM `".static::$TABLE_NAME."` f INNER JOIN `control` c1 ON (f.id = c1.id_firma) " . $cond;
   //    $db = self::getDBConnection();
   //    $result = $db->query($query);
      
   //    return $result;
   // }
   
   public static function deleteById($id) {
      $query = "DELETE FROM `".static::$TABLE_NAME."` " . "WHERE `id`=$id";
      if ($id >= 1) {
         $db = self::getDBConnection();
         $result = $db->query($query);
      }
   }
//extra functionality :D
   public static function countIt($cond = '') {
       //$query = "SELECT COUNT(*) as total FROM `".static::$TABLE_NAME."` " . "WHERE STATUS='$status'";
       //$query = "SELECT COUNT(*) as total FROM `".static::$TABLE_NAME."` " . "WHERE 1";
      $query = "SELECT COUNT(*) as total FROM `".static::$TABLE_NAME."` " . $cond;      
      $db = self::getDBConnection();
      $result = $db->query($query);
      return $result; //this outputs an array!!! :)
         
   }
   
   public static function getCount($cond = '') {
      $query = "SELECT COUNT(*) as total FROM `".static::$TABLE_NAME."` " . $cond;
      $db = self::getDBConnection();
      $result = $db->query($query);
      return $result[0]['total'];
   }
   
   public function escape($string) {
      return self::getDBConnection()->escape($string);
   }
   public function getBy($field, $value) {
      $valueEscaped = $this->escape($value);
      $data = self::getAll("WHERE $field='$valueEscaped' LIMIT 1");
      return $data;
   }
   public function read($field, $value) {
      return self::getAll("WHERE $field='$value'");
   }
   
   public function save() {
      if(empty($this->id)) 
      {
         $this->insert();   
      }
      else
      {
         $this->update();
      }
   }
   
   protected function update() {
    
   }
   protected function insert() {
      
   }
   
   protected static function getDBConnection() {
      if(self::$DB == null) 
      {
         self::$DB = new DBMySql();
         self::$DB->connect();
      }
      return self::$DB;
   }
}