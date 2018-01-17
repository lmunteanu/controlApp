<?php

$errorMessage = '';

$newUser = new User();

if (User::isLogged()) {
   redirect('/admin.php');
}

if (isPost()) {
   //deg($_POST);
   $newUser->name=$_POST['uname']; //daca se muta in else nu mai se autocompleteaza!
   $newUser->email=$_POST['email'];
   if (empty($_POST['uname'])) { //check if username is null
      $errorMessage = 'Username can\'t be empty';
   } elseif (!isEmail($_POST['email'])) {
      $errorMessage = 'The email address is not valid';
   } elseif (User::emailExists($_POST['email'])) { //emailExists functie statica in clasa user, returneaza true/false 
      $errorMessage = 'A User associated with this email address already exists';
   } elseif (empty($_POST['psw'])) { //check if password is null
      $errorMessage = 'Password can\'t be empty';
   } elseif (!isValidPassword($_POST['psw'], $_POST['cpsw'])[0]) {
      $errorMessage = isValidPassword($_POST['psw'], $_POST['cpsw'])[1];
   } else { //totul e ok se poate face insert
      $newUser->password=md5($_POST['psw'] . 's4f3p455');
      $newUser->type='user';
      //$newUser->date_created= date("Y-m-d H:i:s"); //se seteaza direct din clasa User
      //deg($newUser);
      $newUser->save();
      redirect('/admin.php?page=login&register=1');
   }
}

$TEMPLATE_VARS['registerErrorMessage'] = $errorMessage;
$TEMPLATE_VARS['user'] = $newUser;
$TEMPLATE_VARS['mainTemplateFile'] = 'register.php';