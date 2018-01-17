<?php
class User extends BaseObject {
   public static $TABLE_NAME = 'users';
   
   public static function emailExists($email) {
      $userWithSameEmail = new User();
      $userWithSameEmail->getBy("email",$email);
      if(empty($userWithSameEmail->id)) {
         return false; //daca email-ul nu exista in db continua
      }
      return true; //exista - afiseaza eroare!
   }
   
   public static function getUserName($uid) {
       $query = "SELECT `name` FROM `".static::$TABLE_NAME."` WHERE `id`=($uid)";   
      // echo $query;           
      $db = self::getDBConnection();
      $result = $db->query($query);
      if ($result) { return $result[0]['name']; }
      else { return 'unknown'; }
   }
   
   public $id;
   public $name;
   public $email;
   public $password;
   public $type;
   public $date_created;
   
   public function getBy($key, $value) {
      $data = parent::getBy($key,$value);
       if (count($data) > 0) {
          $userData = $data[0];
          
          $this->id = $userData["id"];
          $this->name = $userData["name"];
          $this->email = $userData["email"];
          $this->password = $userData["password"];
          $this->type = $userData["type"];
          $this->date_created = $userData["date_created"];
         //foreach ($data[0] as $key=>$value) {
          //  echo $key,":",$value,"\n";
         //}
      }
   }
   public function login() {
      $_SESSION['loggedUserId'] = $this->id;
      session_regenerate_id(); //changes the id after login
   }
   public static function logout() {
      unset($_SESSION['loggedUserId']);
   }
   public static function isLogged() {
      return isset($_SESSION['loggedUserId']) &&
             !empty($_SESSION['loggedUserId']);
   }
   
    public static function getLogged() {
       if (!self::isLogged()) {
          return null;
       }
      static $user = null;
      if (is_null($user)) {
         $user = new self; //sau new User (pt ca se refera la clasa actuala chiar daca se schimba numele ...)
         $user->getBy('id', $_SESSION['loggedUserId']);    
      }
      return $user;
   }
  
   protected function update() {
        $nameEscaped = $this->escape($this->name);
        $emailEscaped = $this->escape($this-email);
        $query = "UPDATE `".static::$TABLE_NAME."` 
                  SET name = '$nameEscaped',
                      email = '$emailEscaped',                      
                      password = '$this->password',
                      type = '$this->type'
                  WHERE id=($this->id)
                  ";      
      $db = self::getDBConnection();
      $result = $db->query($query);
   }
   
    protected function insert() {
        $nameEscaped = $this->escape($this->name);
        $emailEscaped = $this->escape($this->email);
        $this->date_created = getDateMysql();
        $query = "INSERT INTO `".static::$TABLE_NAME."` 
                  SET name = '$nameEscaped',
                      email = '$emailEscaped',                      
                      password = '$this->password',
                      type = '$this->type',
                      date_created = '$this->date_created'
                 ";      
        $db = self::getDBConnection();
        $result = $db->query($query);
        $this->id = $db->getLastInsertId();
   }
}