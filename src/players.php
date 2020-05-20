<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>My team manager</title>
  <meta name="description" content="Soccer team manager">
  <meta name="author" content="Daniel Messner, Manuel Messner">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

      /* Database connection.*/
      //require_once('db/config.php');
      
      /* Query */
      //$query = "SELECT * FROM player order by plyr_lastname";

      /* Execute the query */
      //$result = $conn->query($query);

      /* Check for errors */
      /*if (!$result)
      {
        echo 'Query error: ' . $conn->error;
        die();
      }*/

      /* Iterate through the result set */
      /*while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr><td>" . $row['plyr_firstname'] . "</td><td>" . $row['plyr_lastname'] . "</td><td>" . 
              $row['plyr_trikotnr'] . "</td><td>" . $row['plyr_birthdate'] . "</td><td><button class=\"btn btn-default\">Edit</button>" . 
              "<button class=\"btn btn-danger btnDelete\">Delete</button></td>";
      }

      $conn->close();*/

    ?>

    </tbody>
    </table>

    <a class="btn btn-default" href="addplayer.php">Add player</a>
  </div>
</div>

<script type="text/javascript">
      fetch('api/getplayers.php')
        .then(function(response) {
            return response.text();
        }).then(function(data) {
            if(data!='null'){
              fillTable(JSON.parse(data));
            }
        }).catch(function(err) {
            console.log ('error ', err);
        })

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
          document.getElementById("bodytableplayers").innerHTML=table;
        }

        function deletePlayer(guidToRemove){
          //todo: confirm modal
          $.post("api/deleteplayer.php", {guid: guidToRemove}, function(result){
            if(result==1){
              location.reload();
            } else {
              alert("Something went wrong. Please try again.");
            }
          });
        }
      </script>

</body>
</html>