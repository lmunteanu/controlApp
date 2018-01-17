<!DOCTYPE html>
<html>

<head>
   <title>Wall Firme </title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="description" content="My smartboard blog firme app firme page">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/public/css/firme/style-comun.css" type="text/css" />
   
   <link rel="stylesheet" href="/public/jq-ui/south-street/jquery-ui.min.css">
   <link rel="stylesheet" href="/public/jq-ui/south-street/theme.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--     <script type="text/javascript" src="/public/js/jquery-3.2.1.min"></script> -->
   <script src="/public/jq-ui/jquery-ui.min.js"></script>
   <script type="text/javascript" src="/public/js/firme/firme.js"></script>
   
</head>

<body>
   <div class="container">
      <div class="menu-div">
        <a class="abutton redText" href="/firme.php">Firme</a>
        <a class="abutton" href="/firme.php?page=add_firma">Adauga Firma</a>
        <a class="abutton" href="/control.php">Controale</a>
        <a class="aLogout" href="/admin.php?page=logout">Logout</a>
      </div>

      <?php require_once FIRME_TEMPLATES_PATH . $TEMPLATE_VARS['templatePath'] ?> 
 
   </div> <!-- end container -->
  
</body>

</html>
