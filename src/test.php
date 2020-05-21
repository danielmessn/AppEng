<!doctype html>

<html lang="en">
<head>
  <title>My team manager</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- Link to open the modal -->
<p><a href="#ex1" rel="modal:open">Open Modal</a></p>


<?php
    include (dirname(__FILE__).'/components/scripts.php');
?>

<!-- jQuery Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<!-- Modal HTML embedded directly into document -->
<div id="modalDialog" class="reset-this modal">
  <p>Delete player?</p>
  <a class="btn btn-primary" href="#" rel="modal:close">Yes</a>
  <a class="btn btn-primary" href="#" rel="modal:close">No</a>
</div>

</body>
</html>