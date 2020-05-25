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
    <h2>Settings</h2>
    <div class="loader"></div>
    <form class="width100">
    <div class="col-md-6 mb-3">
      <div class="form-group">
          <label for="selectTeam">
              Change Team
          </label>
          <select id="selectTeam" name ="team" class="selectpicker form-control" data-live-search="true" onchange="changeTeam(this.value)">
          </select>
      </div>
    </div>
  </form>
  </div>
</div>

<?php
    include (dirname(__FILE__).'/components/scripts.php');
    include (dirname(__FILE__).'/components/scriptsSelect.php');
    
?>

<script type="text/javascript">

var selectedTeam = '';

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


fetch('api/getteams.php')
      .then(function(response) {
          return response.text();
      }).then(function(data) {
          if(data!='null'){
              addTeams(JSON.parse(data));
              $(".loader").hide();
          }
      }).catch(function(err) {
          console.log ('error ', err);
          $(".loader").hide();
      });

  function getSettings(data)
  {
    data.forEach(setting => {       
        selectedTeam = setting.set_team_guid;
    });
  }


  function addTeams(data){
    checkData = true;
    let option = '';
    let select = '';
    
    data.forEach(team => {       
        option = '<option value="'+team.team_guid+'">';    
        option += team.team_name + '</option>';
        select += option;
    });

    document.getElementById("selectTeam").innerHTML=select;
    setTimeout(setData(),200);
  }

  function setData(){
      $('#selectTeam').val(selectedTeam);
      $('.selectpicker').selectpicker('refresh');
      $('.selectpicker').selectpicker('render');
  }

  function changeTeam(teamguid)
  {
    $(".loader").show();
      $.post("api/changeteam.php", {guid: teamguid}, function(result){
        if(result!=1){
          alert("Something went wrong. Please try again.");
        }
        $(".loader").hide();
      });
  }

</script>
</body>
</html>