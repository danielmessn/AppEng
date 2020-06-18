
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
  <h2>Edit Match</h2>
		<div class="row">
			<div class="col-md-12 order-md-1">
				
                <form action="api/editmatch.php" method="post" class="needs-validation" novalidate>
                <input id="guid-match" type="hidden" name="guid" class="form-control">
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
                    <select class="selectpicker form-control" name="home_away" id="home_away">
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
                <button class="btn btn-default" type="submit">Save</button>
                <a onClick="setGuidToDelete(getCurrentGuid())" href="#modalDialog" rel="modal:open" class="btn btn-danger">Delete</a>
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

    $modalText = "Delete match?";
    $myFunction = "deleteMatch";
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
              value = value.replace(' ', 'T');
            
            $("input[name='"+key+"']").val(value);

            if(key == 'home_away')
              $("#"+key).val(value);
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

  function deleteMatch(guidToRemove){
      $(".spinner-border").show();
      $.post("api/deletematch.php", {guid: guidToRemove}, function(result){
        if(result==1){
          window.location.href = "matches.php";
        } else {
          alert("Something went wrong. Please try again.");
          $(".spinner-border").hide();
        }
      });
  }

  function getCurrentGuid()
  {
    return $('#guid-match').val();
  }

</script>
</div>

</body>
</html>