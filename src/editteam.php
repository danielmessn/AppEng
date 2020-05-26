
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
      $active = 'settings';
      include (dirname(__FILE__).'/components/navbar.php');
  ?>
  
  <div id="pageContent">
  <div class="container">
  <h2>Edit Team</h2>
		<div class="row">
			<div class="col-md-12 order-md-1">
				
				<form action="api/editteam.php" method="post" class="needs-validation" novalidate>
        <input id="guid-team" type="hidden" name="guid" class="form-control">
        <input id="guid-season" type="hidden" name="seaGuid" class="form-control">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="desc">Name</label>
            <div class="input-group">
              <input type="text" class="form-control" name="desc" id="desc" required pattern=".*\S+.*">
              <div class="invalid-feedback">
                Please enter name.
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-default" type="submit">Save</button>
        <!--<a onClick="setGuidToDelete(getCurrentGuid())" href="#modalDialog" rel="modal:open" class="btn btn-danger">Delete</a>-->
        <div class="ml-5 spinner-border text-dark" role="status">
          <span class="sr-only">Loading...</span>
        </div>
				</form>
			</div>
		</div>

  </div>
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');

    $modalText = "Delete team?";
    $myFunction = "deleteTeam";
    include (dirname(__FILE__).'/components/modal.php');

?>

<script type="text/javascript">
    $(".spinner-border").hide();

    (function() {
        let url = window.location.href;
        let params = url.slice(url.lastIndexOf('?'),url.length);
        let searchParams = new URLSearchParams(params);
        searchParams.forEach(function(value, key) {
            //format for picker
            if(key == 'datetime')
              value = value.replace(' ', 'T')
            
            $("input[name='"+key+"']").val(value);
        });
    })();

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
  }, false);
  })();

  function deleteTraining(guidToRemove){
      $(".spinner-border").show();
      $.post("api/deletetraining.php", {guid: guidToRemove}, function(result){
        if(result==1){
          window.location.href = "trainings.php";
        } else {
          alert("Something went wrong. Please try again.");
          $(".spinner-border").hide();
        }
      });
  }

  function getCurrentGuid()
  {
    return $('#guid-training').val();
  }

</script>
</div>

</body>
</html>