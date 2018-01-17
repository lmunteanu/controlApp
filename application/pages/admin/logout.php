<?php
   
   if (User::isLogged()) {
      User::logout();
   }
   redirect('/index.php');