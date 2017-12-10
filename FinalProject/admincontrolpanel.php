<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
  
    <?php
    session_start();
    if($_SESSION['loggedin'] == 'n'){
      header('Location: adminpage.php');
    }
   
    
    ?>
</head>


<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">GSSP</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="adminpage.php">Admin <span class="sr-only">(current)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/adminlogout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    
    <main role="main" class="container">
      <div id="reportbtns">
      <button id="avgpricereport" class="btn btn-info">Generate Average Price Report</button>
      <button id="avgratingreport" class="btn btn-info">Generate Average MetaRating Report</button>
      <button id="avgyearreport" class="btn btn-info">Generate Average Release Year Report</button><br><br>
      </div>
      <div id="reports">
      </div><br><hr>
      <div id="game-list">
        <img id="loading-gif" src="img/loading.gif">
      </div>
    
    </main>
    
    
    <br>
    <br>
    <br>
    <script type="text/javascript" src="js/adminview.js"></script>
</body>


</html>
