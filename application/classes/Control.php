<?php

class Control extends BaseObject {
   public static $TABLE_NAME = 'control';
   
   public $id_control;
   public $cid_firma;
   public $data_control;
   public $data_start;
   public $data_update;
   public $nr_ore;
   public $observatii;
   
   public function __construct($id = null) 
   {
      if ($id) {
         $this->getBy('id_control', $id);
      }
   }
   
   public function getBy($key,$value)
   {
      $data = parent::getBy($key,$value);
      if (count($data) > 0) {
         $dateFirma = $data[0];
         
         $this->id_control = $dateFirma["id_control"];
         $this->cid_firma = $dateFirma["cid_firma"];
         $this->data_control = $dateFirma["data_control"];
         $this->data_start = $dateFirma["data_start"];
         $this->data_update = $dateFirma["data_update"];
         $this->nr_ore = $dateFirma["nr_ore"];
         $this->observatii = $dateFirma["observatii"];

      }
   }
   
   //begin the refactory
   protected function update() 
   {
   //    $titleEscaped = $this->escape($this->title);
   //    $desc = $this->escape($this->description);
      $this->data_update = getDateMysql();
      $query1 = "UPDATE `".static::$TABLE_NAME."` 
                SET cid_firma = '$this->cid_firma',
                    data_control = '$this->data_control',
                    data_update = '$this->data_update',
                    nr_ore = '$this->nr_ore',
                    observatii = '$this->observatii'
                WHERE id_control=($this->id_control)
               ";
      // $query2 = "UPDATE `firma` 
      //             SET data_ucontrol = '$this->data_control'
      //             WHERE id=($this->id_firma)
      //             ";
      $db = self::getDBConnection();
      $result = $db->query($query1);
      // $result = $db->query($query2);
   }
   
   // public function save() 
   // {
   //  parent::save();
   // }
   
   public function save() {
      if(empty($this->id_control)) 
      {
         $this->insert();   
      }
      else
      {
         $this->update();
      }
   }
   
   
   protected function insert() 
   {
   //      $titleEscaped = $this->escape($this->title);
   //      $desc = $this->escape($this->description);
      $this->data_start = getDateMysql();
      $query1 = "INSERT INTO `".static::$TABLE_NAME."` 
                 SET cid_firma = '$this->cid_firma',
                     data_control = '$this->data_control',                      
                     data_start = '$this->data_start',
                     nr_ore = '$this->nr_ore',
                     observatii = '$this->observatii'
             ";
      // $query2 = "UPDATE `firma` 
      //           SET data_ucontrol = '$this->data_control'
      //           WHERE id=($this->id_firma)
      //        ";
      $db = self::getDBConnection();
      $result = $db->query($query1);
      $this->id = $db->getLastInsertId();
      // $result = $db->query($query2);
   }
}