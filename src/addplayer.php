
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
      $active = 'players';
      include (dirname(__FILE__).'/components/navbar.php');
  ?>
  
  <div class="main" id="divAddPlayers">
  <div class="container">
  <h2 class="width100">Add Player</h2>
		<div class="row">
			<div class="col-md-12 order-md-1">
				
				<form action="api/addplayer.php" method="post" class="needs-validation" novalidate>
        
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="firstname">First name</label>
            <div class="input-group">
              <input type="text" class="form-control" name="firstname" id="firstname" required>
              <div class="invalid-feedback">
                Please enter first name.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastname">Last name</label>
            <div class="input-group">
              <input type="text" class="form-control" name="lastname" id="lastname" required>
              <div class="invalid-feedback">
                Please enter last name.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="firstname">Trikot nr</label>
            <div class="input-group">
              <input type="text" class="form-control" name="trikotnr" id="trikotnr">
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="birthdate">Birth date</label>
            <div class="input-group">
              <input type="date" class="form-control" name="birthdate" id="birthdate">
            </div>
          </div>
        </div>
				<button class="btn btn-default" type="submit">Add player</button>
				</form>
			</div>
		</div>

  </div>
</div>
  
<?php
    include (dirname(__FILE__).'/components/scripts.php');
?>

<script type="text/javascript">
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
</script>
</div>
</body>
</html>