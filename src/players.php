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
  <div id="tableplayers">
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

    <a class="btn btn-default" href="addplayer.php">Add player</a>
  </div>
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');
?>

<script type="text/javascript">
        getPlayers();

        function getPlayers() {
          fetch('api/getplayers.php')
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
              '<button onClick=\"deletePlayer(\''+player.plyr_guid+'\')\" class=\"btn btn-danger btnDelete\">Delete</button></td>\
              </tr>';
              table += row;
          });
          $(".loader").hide();
          document.getElementById("bodytableplayers").innerHTML=table;
        }

        function deletePlayer(guidToRemove){
          if(confirm("Delete Player?"))
          {
            $(".loader").show();
            $.post("api/deleteplayer.php", {guid: guidToRemove}, function(result){
              if(result==1){
                getPlayers();
              } else {
                alert("Something went wrong. Please try again.");
                $(".loader").hide();
              }
            });
          }
        }
      </script>
</body>
</html>