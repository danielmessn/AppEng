<!doctype html>

<html lang="en">
<head>
  <?php
    include (dirname(__FILE__).'/components/head.php');
  ?>
  <title>My team manager</title>
</head>

<body>
<div class="wrapper">
  <header>
    <h1>My team manager</h1>
  </header>
  <?php
      $active = 'index';
      include (dirname(__FILE__).'/components/navbar.php');
  ?>
    
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');
  ?>

</body>
</html>