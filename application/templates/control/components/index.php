<!DOCTYPE html>
<html>

<head>

   <meta charset="UTF-8">
   <!--<link rel="shortcut icon" type="image/x-icon" href="https://production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />-->
   <!--<link rel="mask-icon" type="" href="https://production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />-->
   <title>StatsPage</title>
   <meta name="description" content="My smartboard blog firme app control page">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel='stylesheet prefetch' href='/public/jq-ui/south-street/jquery-ui.min.css'>
   <link rel='stylesheet prefetch' href='/public/jq-ui/south-street/theme.css'>
   <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css'>
   <link rel='stylesheet prefetch' href='/public/css/firme/firme-bootstrap.css'>

</head>

<body translate="no">

   <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">Control-Firme App.</a>
         <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                  <a class="nav-link" href="/firme.php">Firme</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/control.php">Controale<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/control.php?page=add_control">Adauga control</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/control.php?page=stats">Stats</a>
               </li>
            </ul>
            <a class="nav-link text-light" href="/admin.php?page=logout">Logout</a>
         </div>
        </div>
      </nav>
   </header>

   <main role="main">
      <div class="container pagination-spacing">

         <?php require_once CONTROL_TEMPLATES_PATH . $TEMPLATE_VARS['templatePath'] ?>

      </div>
      <!-- end container -->
   </main>

   <footer class="mastfoot">
      <div class="inner">
         <p class="text-center">Control-Firme application for <a href="https://getbootstrap.com/">Cornelia</a>, by <a href="https://twitter.com/mdo">Lucianu</a>.</p>
      </div>
   </footer>

   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
   <script src='/public/js/firme/firme.js'></script>

</body>

</html>
