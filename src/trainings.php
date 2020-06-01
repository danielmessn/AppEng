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
      $active = 'trainings';
      include (dirname(__FILE__).'/components/navbar.php');
  ?>
  <div id="pageContent">
    <h2>Trainings</h2>
    <div class="loader"></div>
    <table class="table">
    <thead>
        <tr>
          <th scope="col">Date and time</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody id="bodytableplayers">
    <?php


    ?>

    </tbody>
    </table>

    <a class="btn btn-default" href="#" onmouseover="this.href = &quot;addtraining.php?teamguid=&quot; + getSelectedTeam()">Add training</a>

  </div>
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');

    $modalText = "Delete training?";
    $myFunction = "deleteTraining";
    include (dirname(__FILE__).'/components/modal.php');
?>

<script type="text/javascript">

        fetch('api/getsettings.php')
        .then(function(response) {
            return response.text();
        }).then(function(data) {
            if(data!='null'){
                getSettings(JSON.parse(data));
            }
            else 
              window.open("settings.php","_self")
        }).catch(function(err) {
            console.log ('error ', err);
        });

        function getSettings(data)
        {
          data.forEach(setting => {       
              selectedTeam = setting.set_team_guid;
          });
          if (selectedTeam == null)
            window.open("settings.php","_self")
          getTrainings(selectedTeam);
        }

        function getTrainings(teamguid) {
          fetch('api/gettrainings.php?teamguid='+teamguid)
            .then(function(response) {
                return response.text();
            }).then(function(data) {
                if(data!='null'){
                  fillTable(JSON.parse(data));
                } else {
                  $(".loader").hide();
                }
            }).catch(function(err) {
                console.log ('error ', err);
            })
        }

        function fillTable(data){
          let row = '';
          let table = '';
  
          data.forEach(training => {    
              row = '<tr>\
              <td>'+ training.train_datetime +'</td>\
              <td>'+ ((training.train_desc == null) ? '' : training.train_desc) +'</td>\
              <td><a href="api/gettraining.php?guidTraining='+training.train_guid+'" class=\"btn btn-default\">Edit</a>'+
              '<a onClick=\"setGuidToDelete(\''+training.train_guid+'\')\" href=\"#modalDialog\" rel=\"modal:open\" class=\"btn btn-danger btnDelete\">Delete</a></td>\
              </tr>';
              table += row;
          });

          $(".loader").hide();
          document.getElementById("bodytableplayers").innerHTML=table;
        }

        function deleteTraining(guidToRemove){
            $(".loader").show();
            $.post("api/deletetraining.php", {guid: guidToRemove}, function(result){
              if(result==1){
                getTrainings(selectedTeam);
              } else {
                alert("Something went wrong. Please try again.");
                $(".loader").hide();
              }
            });
        }

        function getSelectedTeam()
        {
          return selectedTeam;
        }

      </script>
</body>
</html>