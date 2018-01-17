<?php

error_reporting(E_ALL);

//error_reporting(E_ALL & ~E_NOTICE);

define('APPLICATION_PATH', dirname(__FILE__) . '/');
define('ADMIN_TEMPLATES_PATH', APPLICATION_PATH . 'templates/admin/');
define('PUBLIC_TEMPLATES_PATH', APPLICATION_PATH . 'templates/blog/');
define('FIRME_TEMPLATES_PATH', APPLICATION_PATH . 'templates/firme/');
define('CONTROL_TEMPLATES_PATH', APPLICATION_PATH . 'templates/control/');
define('PUBLIC_DIR', APPLICATION_PATH . '../public');
define('WEB_DIR', APPLICATION_PATH . '../');
define('UPLOADS_DIR', 'public/uploads/');
define('THUMBNAILS_DIR', 'public/thumbnails/');
define('BLOG_ARTICLE_PER_PAGE', 3);
define('ADMIN_ARTICLE_PER_PAGE', 4);
define('ITEMS_PER_PAGE', 10);
define('CONTROL_PRICE', 69);

//echo APPLICATION_PATH . " <br /> " . ADMIN_TEMPLATES_PATH;

require_once (APPLICATION_PATH . 'functions.php');

spl_autoload_register("autoLoadClasses"); //incarca clasele automat!