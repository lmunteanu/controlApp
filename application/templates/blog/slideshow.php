<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Slideshow</title>
    <link rel="stylesheet" type="text/css" href="/public/css/blog/slideshow.css">
</head>
<body>

   <h1>My slideshow</h1>
   
   <div class="slideshow">
   </div>
   <div class="buttons"></div>
   
   <script>
      var jsArray = JSON.parse('<?=Media::getAllLinks();?>');
   </script>
   <script type="text/javascript" src="/public/js/blog/slideshow.js"></script>

</body>
</html>