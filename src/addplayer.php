
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
  
  <div id="pageContent">
  <div class="container">
  <h2>Add Player</h2>
		<div class="row">
			<div class="col-md-12 order-md-1">
				
				<form action="api/addplayer.php" method="post" class="needs-validation" novalidate>
        <input id="guid-team" type="hidden" name="teamguid" class="form-control">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="firstname">First name</label>
            <div class="input-group">
              <input type="text" class="form-control" name="firstname" id="firstname" required pattern=".*\S+.*">
              <div class="invalid-feedback">
                Please enter first name.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastname">Last name</label>
            <div class="input-group">
              <input type="text" class="form-control" name="lastname" id="lastname" required pattern=".*\S+.*">
              <div class="invalid-feedback">
                Please enter last name.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="trikotnr">Trikot nr</label>
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
          <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="selectPosition">
                    Pisition
                </label>
                <select id="selectPosition" name ="position" class="selectpicker form-control" data-live-search="true">
                </select>
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
    include (dirname(__FILE__).'/components/scriptsSelect.php');
?>

<script type="text/javascript">

(function() {
        let url = window.location.href;
        let params = url.slice(url.lastIndexOf('?'),url.length);
        let searchParams = new URLSearchParams(params);
        searchParams.forEach(function(value, key) {
            $("input[name='"+key+"']").val(value);
        });
    })();

fetch('api/getpositions.php')
      .then(function(response) {
          return response.text();
      }).then(function(data) {
          if(data!='null'){
              addPositions(JSON.parse(data));
          }
      }).catch(function(err) {
          console.log ('error ', err);
      });

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

function addPositions(data){
    checkData = true;
    let option = '';
    let select = '';
    //if no position selected
    select = '<option value="">'; 
    data.forEach(position => {       
        option = '<option value="'+position.pos_guid+'">';    
        option += position.pos_shortcut + ' - ' + position.pos_desc + '</option>';
        select += option;
    });
    document.getElementById("selectPosition").innerHTML=select;
    setTimeout(setData(),200);
  }

  function setData(){
      if(checkData==true){
          let url = window.location.href;
          let params = url.slice(url.lastIndexOf('?'),url.length);
          let searchParams = new URLSearchParams(params);
          searchParams.forEach(function(value, key) {
              $("#"+key).val(value);
          });
          $('.selectpicker').selectpicker('refresh');
          $('.selectpicker').selectpicker('render');
      }
  }

</script>
</div>
</body>
</html>