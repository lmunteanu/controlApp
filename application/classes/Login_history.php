<?php
class Login_history extends BaseObject {
   public static $TABLE_NAME = 'login_history';
   
   public $id;
   public $username;
   public $userIp;
   public $date;
   public $success;
   public $password;
   
    public function insert() {
        $nameEscaped = $this->escape($this->username);
        $passwordEscaped = $this->escape($this->password);
        $query = "INSERT INTO `".static::$TABLE_NAME."` 
                  SET username = '$nameEscaped',
                      userIp = '$this->userIp',
                      success = '$this->success',
                      password = '$passwordEscaped'
                 ";      
        $db = self::getDBConnection();
        $result = $db->query($query);
        $this->id = $db->getLastInsertId();
   }
}