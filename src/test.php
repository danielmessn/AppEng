<!doctype html>

<html lang="en">
<head>
  <?php
    include (dirname(__FILE__).'/components/head.php');
  ?>
  <title>My team manager</title>
</head>

<body>

<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="#" rel="modal:close">Close</a>
</div>

<!-- Link to open the modal -->
<p><a href="#ex1" rel="modal:open">Open Modal</a></p>

<?php
    include (dirname(__FILE__).'/components/scripts.php');
?>

</body>

<script>

$('<div></div>').appendTo('body')
  .html('<div><h6>Yes or No?</h6></div>')
  .dialog({
      modal: true, title: 'message', zIndex: 10000, autoOpen: true,
      width: 'auto', resizable: false,
      buttons: {
          Yes: function () {
              doFunctionForYes();
              $(this).dialog("close");
          },
          No: function () {
              doFunctionForNo();
              $(this).dialog("close");
          }
      },
      close: function (event, ui) {
          $(this).remove();
      }
});

</script>

</html>