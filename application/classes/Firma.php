<?php

class Firma extends BaseObject {
   public static $TABLE_NAME = 'firma';
   
   public $id_firma;
   public $denumire_unitate;
   public $adresa;
   public $nr_strada;
   public $cui;
   public $cod_caen;
   public $categorie;
   public $persoana_contact;
   public $adresa_pct_lucru;
   public $nr_doc_inregistrare;
   public $risc_actual;
   public $ore_control;
   public $data_start;
   public $data_sfarsit;
   public $data_update;
   public $telefon;
   public $observatii;
   
   public function __construct($id = null) 
   {
      if ($id) {
         $this->getBy('id_firma', $id);
      }
   }
   
   public function getBy($key,$value)
   {
      $data = parent::getBy($key,$value);
      if (count($data) > 0) {
         $dateFirma = $data[0];
         
         $this->id_firma = $dateFirma["id_firma"];
         $this->denumire_unitate = $dateFirma["denumire_unitate"];
         $this->adresa = $dateFirma["adresa"];
         $this->nr_strada = $dateFirma["nr_strada"];
         $this->cui = $dateFirma["cui"];
         $this->cod_caen = $dateFirma["cod_caen"];
         $this->categorie = $dateFirma["categorie"];
         $this->persoana_contact = $dateFirma["persoana_contact"];
         $this->adresa_pct_lucru = $dateFirma["adresa_pct_lucru"];
         $this->nr_doc_inregistrare = $dateFirma["nr_doc_inregistrare"];
         $this->risc_actual = $dateFirma["risc_actual"];
         $this->ore_control = $dateFirma["ore_control"];
         $this->date_start = $dateFirma["data_start"];
         $this->data_sfarsit = $dateFirma["data_sfarsit"];
         $this->data_update = $dateFirma["data_update"];
         $this->telefon = $dateFirma["telefon"];
         $this->observatii = $dateFirma["observatii"];
      }
   }
   
   //begin the refactory
   protected function update() 
   {
   //    $titleEscaped = $this->escape($this->title);
   //    $desc = $this->escape($this->description);
   // categorie = '$this->categorie',
      $this->data_update = getDateMysql();
      $query = "UPDATE `".static::$TABLE_NAME."` 
                SET denumire_unitate = '$this->denumire_unitate',
                    adresa = '$this->adresa',                      
                    nr_strada = '$this->nr_strada',
                    cui = '$this->cui',
                    cod_caen = '$this->cod_caen',
                    persoana_contact = '$this->persoana_contact',
                    adresa_pct_lucru = '$this->adresa_pct_lucru',
                    nr_doc_inregistrare = '$this->nr_doc_inregistrare',
                    risc_actual = '$this->risc_actual',
                    ore_control = '$this->ore_control',
                    data_update = '$this->data_update',
                    telefon = '$this->telefon',
                    observatii = '$this->observatii'
                WHERE id_firma=($this->id_firma)
               ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
   }
   
   // public function save() 
   // {
   //  // $this->data_update = getDateMysql();
   //  parent::save();
   // }
   
   public function save() {
      if(empty($this->id_firma)) 
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
      $query = "INSERT INTO `".static::$TABLE_NAME."` 
                SET denumire_unitate = '$this->denumire_unitate',
                 adresa = '$this->adresa',                      
                 nr_strada = '$this->nr_strada',
                 cui = '$this->cui',
                 cod_caen = '$this->cod_caen',
                 categorie = '$this->categorie',
                 persoana_contact = '$this->persoana_contact',
                 adresa_pct_lucru = '$this->adresa_pct_lucru',
                 nr_doc_inregistrare = '$this->nr_doc_inregistrare',
                 risc_actual = '$this->risc_actual',
                 ore_control = '$this->ore_control',
                 data_start = '$this->data_start',
                 telefon = '$this->telefon',
                 observatii = '$this->observatii'
             ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
      $this->id_firma = $db->getLastInsertId();
   }
   
   public static function getStaticDenumireFirma($id_firma) {
      $query = "SELECT `denumire_unitate` FROM `".static::$TABLE_NAME."` WHERE `id_firma`=($id_firma)";   
      // echo $query;           
      $db = self::getDBConnection();
      $result = $db->query($query);
      //return !empty($result) ? 'public/uploads/' . $result[0]['name'] 
      return !empty($result) 
      ? $result[0]['denumire_unitate'] 
      : 'nimic';
   }
   
}