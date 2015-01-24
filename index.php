<?php
  require 'php/content-request.php';
  require 'php/alter-content.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>responsive image loader</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper" id="content">
    <?php
      echo get_content();
    ?>
  </div>

 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <!--<script src="js/imgLoad.js"></script>-->
</body>
</html>