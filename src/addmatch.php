
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
      $active = 'matches';
      include (dirname(__FILE__).'/components/navbar.php');
  ?>
  
  <div id="pageContent">
  <div class="container">
  <h2>Add match</h2>
		<div class="row">
			<div class="col-md-12 order-md-1">
				
				<form action="api/addmatch.php" method="post" class="needs-validation" novalidate>
        <input id="guid-team" type="hidden" name="teamguid" class="form-control">
        <div class="form-row">
          <div class="col-md-3">
            <label for="datetime">Date and time</label>
            <div class="input-group">
              <input type="datetime-local" class="form-control" name="datetime" id="datetime" required>
              <div class="invalid-feedback">
                Please enter date and time.
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <label for="opponent">Opponent</label>
            <div class="input-group">
              <input type="text" class="form-control" name="opponent" id="opponent" required>
              <div class="invalid-feedback">
                Please enter an opponent.
              </div>
            </div>
          </div>
          <div class="col-md-2">
          <label for="home_away">Home/Away</label>
            <select class="form-control" name="home_away" id="home_away">
              <option value="Home">Home</option>
              <option value="Away">Away</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="team_score">Team Score</label>
            <div class="input-group">
              <input type="number" min="0" class="form-control" name="team_score" id="team_score">
              <div class="invalid-feedback">
                Please enter a valid score.
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <label for="opponent_score">Opponent Score</label>
            <div class="input-group">
              <input type="number" min="0" class="form-control" name="opponent_score" id="opponent_score">
              <div class="invalid-feedback">
                Please enter a valid score.
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-default" type="submit">Add Match</button>
				</form>
			</div>
		</div>

  </div>
</div>
  
<?php
    include (dirname(__FILE__).'/components/scripts.php');
?>

<script type="text/javascript">

(function() {
        let url = window.location.href;
        let params = url.slice(url.lastIndexOf('?'),url.length);
        let searchParams = new URLSearchParams(params);
        searchParams.forEach(function(value, key) {
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


</script>
</div>
</body>
</html>