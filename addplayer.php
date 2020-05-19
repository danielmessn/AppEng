<?php

  // Define variables and initialize with empty values
  $firstname = $lastname = $trikotnr = $birthdate = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $trikotnr = trim($_POST['trikotnr']);
      $birthdate = trim($_POST['birthdate']);
      

      require_once('config.php');

      $trikotnr = !empty($trikotnr) ? "'". mysqli_real_escape_string($link, $trikotnr)."'" : 'null';
      $birthdate = !empty($birthdate) ? "'". mysqli_real_escape_string($link, $birthdate)."'" : 'null';

      /* Build the query escaping the values */
      $query = "INSERT INTO player (plyr_guid, plyr_firstname, plyr_lastname, plyr_trikotnr, plyr_birthdate) VALUES 
      (uuid(), '" . mysqli_real_escape_string($link, $firstname) . "', '" . mysqli_real_escape_string($link, $lastname) . "'
      , " . $trikotnr . ", " . $birthdate . ")";

      echo "<p>" . $query . "</p>";

      /* Execute the SQL query */
      if (!mysqli_query($link, $query))
      {
        /* if mysqli_query() returns FALSE it means an error occurred */
        echo 'Query error: ' . mysqli_error($link);
        die();
      }

      echo "Player inserted!";

      mysqli_close($link);

      // Redirect user to players.php page
      header("location: players.php");
  }

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>My team manager</title>
  <meta name="description" content="Soccer team manager">
  <meta name="author" content="Daniel Messner, Manuel Messner">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="wrapper">
  <header>
    <h1>My team manager</h1>
  </header>
  <div id="nav">
    <div class="asideLink"><a href="index.php">Home</a></div>
    <div class="asideLink"><a href="players.php">Players</a><br></div>
  
  </div>
  
  <div class="main" id="divAddPlayers">
  <div class="container">

		<div class="row">
			<div class="col-md-12 order-md-1">
				
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate>
        
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
				<button class="btn btn-primary" type="submit">Add player</button>
				</form>
			</div>
		</div>

  </div>
</div>
  
  <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script>
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