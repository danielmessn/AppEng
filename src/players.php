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
    <h2>Players</h2>
    <div class="loader"></div>
    <table class="table">
    <thead>
        <tr>
          <th scope="col">First name</th>
          <th scope="col">Last name</th>
          <th scope="col">Trikot Nr.</th>
          <th scope="col">Birthdate</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody id="bodytableplayers">
    <?php


    ?>

    </tbody>
    </table>

    <a class="btn btn-default" href="#" onmouseover="this.href = &quot;addplayer.php?teamguid=&quot; + getSelectedTeam()">Add player</a>

  </div>
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');

    $modalText = "Delete player?";
    $myFunction = "deletePlayer";
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
          getPlayers(selectedTeam);
        }

        function getPlayers(teamguid) {
          fetch('api/getplayers.php?teamguid='+teamguid)
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
  
          data.forEach(player => {     
              row = '<tr>\
              <td>'+ player.plyr_firstname +'</td>\
              <td>'+ player.plyr_lastname +'</td>\
              <td>'+ ((player.plyr_trikotnr == null) ? '' : player.plyr_trikotnr) +'</td>\
              <td>'+ ((player.plyr_birthdate == null) ? '' : player.plyr_birthdate) +'</td>\
              <td><a href="api/getplayer.php?idPlayer='+player.plyr_guid+'" class=\"btn btn-default\">Edit</a>'+
              '<a onClick=\"setGuidToDelete(\''+player.plyr_guid+'\')\" href=\"#modalDialog\" rel=\"modal:open\" class=\"btn btn-danger btnDelete\">Delete</a></td>\
              </tr>';
              table += row;
          });

          $(".loader").hide();
          document.getElementById("bodytableplayers").innerHTML=table;
        }

        function deletePlayer(guidToRemove){
            $(".loader").show();
            $.post("api/deleteplayer.php", {guid: guidToRemove}, function(result){
              if(result==1){
                getPlayers(selectedTeam);
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