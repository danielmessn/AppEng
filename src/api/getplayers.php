<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>My team manager</title>
  <meta name="description" content="Soccer team manager">
  <meta name="author" content="Daniel Messner, Manuel Messner">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
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
        </tr>
    </thead>
    <tbody>

    <?php

      /* Database connection.*/
      require_once('db/config.php');
      
      /* Query */
      $query = "SELECT * FROM player order by plyr_lastname";

      /* Execute the query */
      $result = $conn->query($query);

      /* Check for errors */
      if (!$result)
      {
        echo 'Query error: ' . $conn->error;
        die();
      }

      /* Iterate through the result set */
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr><td>" . $row['plyr_firstname'] . "</td><td>" . $row['plyr_lastname'] . "</td><td>" . 
              $row['plyr_trikotnr'] . "</td><td>" . $row['plyr_birthdate'] . "</td><td><button class=\"btn btn-default\">Edit</button></td>" . 
              "<td><button class=\"btn btn-danger\">Delete</button></td>";
      }

      $conn->close();

    ?>

    </tbody>
    </table>

    <a class="btn btn-default" href="addplayer.php">Add player</a>
  </div>
</div>
</body>
</html>