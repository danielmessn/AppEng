
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
  <h2>Create new team</h2>
		<div class="row">
			<div class="col-md-12 order-md-1">
				<form action="api/addteam.php" method="post" class="needs-validation" novalidate>
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
        <button class="btn btn-default" type="submit">Create team</button>
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