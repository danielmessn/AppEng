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
  <div class="row" id="pageContent">
    <div class="col-12">
      <h2>Home</h2>
      <div class="loader"></div>
    </div>
    <div class="col-sm-12 col-md-6" id="nextTraining">
      <h3>Next training</h3>
    </div>
    <div class="col-sm-12 col-md-6" id="nextMatch">
      <h3>Next match</h3>
    </div>
  </div>
    
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');
  ?>

<script>
fetch('api/getsettings.php')
        .then(function(response) {
            return response.text();
        }).then(function(data) {
            if(data!='null'){
                getSettings(JSON.parse(data));
            }
        }).catch(function(err) {
            console.log ('error ', err);
        });

        function getSettings(data)
        {
          data.forEach(setting => {       
              selectedTeam = setting.set_team_guid;
          });
          getTrainings(selectedTeam);
        }

        function getTrainings(teamguid) {
          fetch('api/gettrainings.php?teamguid='+teamguid)
            .then(function(response) {
                return response.text();
            }).then(function(data) {
                if(data!='null'){
                  createContent(JSON.parse(data));
                } else {
                  $(".loader").hide();
                }
            }).catch(function(err) {
                console.log ('error ', err);
            })
        }

        function createContent(data){
          let content = '';
          data.forEach(training => {     
              content =
              '<p>'+ training.train_datetime +'</p>\
              <p>'+ ((training.train_desc == null) ? '' : training.train_desc) +'</p>\
              <a href="api/gettraining.php?guidTraining='+training.train_guid+'" class=\"btn btn-default\">Edit</a>'
          });

          $(".loader").hide();
          $("#nextTraining").html($("#nextTraining").html() + content);
        }
</script>
</body>
</html>