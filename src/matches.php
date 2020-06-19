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
    <h2>Matches</h2>
    <div class="loader"></div>
    <table class="table">
    <thead>
        <tr>
          <th scope="col">Date and time</th>
          <th scope="col">Opponent</th>
          <th scope="col">Home/Away</th>
          <th scope="col">Team Score</th>
          <th scope="col">Opponent Score</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody id="bodytableplayers">
    <?php


    ?>

    </tbody>
    </table>

    <a class="btn btn-default" href="#" onmouseover="this.href = &quot;addmatch.php?teamguid=&quot; + getSelectedTeam()">Add match</a>

  </div>
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');

    $modalText = "Delete match?";
    $myFunction = "deleteMatch";
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
          getMatches(selectedTeam);
        }

        function getMatches(teamguid) {
          fetch('api/getmatches.php?teamguid='+teamguid)
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
  
          data.forEach(match => {    
              row = '<tr>\
              <td>'+ match.match_datetime +'</td>\
              <td>'+ match.match_team_opponent +'</td>\
              <td>'+ match.match_home_away +'</td>\
              <td>'+ ((match.match_team_score == null) ? '-' : match.match_team_score) +'</td>\
              <td>'+ ((match.match_opponent_score == null) ? '-' : match.match_opponent_score) +'</td>\
              <td><a href="api/getmatch.php?guidMatch='+match.match_guid+'" class=\"btn btn-default\">Edit</a>'+
              '<a onClick=\"setGuidToDelete(\''+match.match_guid+'\')\" href=\"#modalDialog\" rel=\"modal:open\" class=\"btn btn-danger btnDelete\">Delete</a></td>\
              </tr>';
              table += row;
          });

          $(".loader").hide();
          document.getElementById("bodytableplayers").innerHTML=table;
        }

        function deleteMatch(guidToRemove){
            $(".loader").show();
            $.post("api/deletematch.php", {guid: guidToRemove}, function(result){
              if(result==1){
                getMatches(selectedTeam);
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