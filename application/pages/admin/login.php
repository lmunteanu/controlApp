<?php

$msg = isset($_GET['register']) ? 'You are now registered, proceed with login.' : null;

$TEMPLATE_VARS['successMsg'] = $msg;

if (User::isLogged()) {
   redirect('/admin.php');
}

if (isPost()) {
   $user = new User();
   $loginHistory = new Login_history();
   $user->getBy('name', $_POST['uname']);
   $loginHistory->username = $_POST['uname'];
   $loginHistory->userIp = getUserIp();
   
   // deg($_SESSION['came_from']);
   // die;
   if ($user->password === md5($_POST['psw'] . 's4f3p455')) {
      $user->login();
      $loginHistory->success = "yes";
      $loginHistory->password = md5($_POST['psw'] . 's4f3p455');
      $loginHistory->insert();
      if ($_SESSION['came_from']) {
         redirect($_SESSION['came_from']);
      } else {
         redirect('/admin.php');
      }
   } else {
      $loginHistory->success = "no";
      $loginHistory->password = $_POST['psw'];
      $loginHistory->insert();
      echo "password error!!!" . " " . getUserIp(); //afisam eroare
      die; //ramanem aici!
      
   }
}
//header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SESSION['came_from']);
$TEMPLATE_VARS['mainTemplateFile'] = 'login.php';