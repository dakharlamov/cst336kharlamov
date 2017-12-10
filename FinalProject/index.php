<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    <link rel="stylesheet" href="css/styles.css" type="text/css" />

    <?php
    
        session_start();
        
        if( $_SESSION['loggedin'] != 'y'){
          $_SESSION['loggedin'] = "n";
        }
    ?>
    
</head>


<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">GSSP</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminpage.php">Admin</a>
          </li>
        </ul>
      </div>
    </nav>

    
    <main role="main" class="container">

      <div class="starter-template">
        <h1>Your games, faster</h1>
        <p class="lead">Shop for your favorite titles with ease.</p>
        <hr>
        
      </div>
      
      <div id="search">
          <button id="refreshbtn" class="btn btn-info">Refresh List</button>&nbsp&nbsp&nbsp
          <input type="text" id="searchquery" placeholder="Title" />
          <button id="searchbtn" class="btn btn-info">Search</button>
      </div><br>
      
      <div id="game-list">
        <img id="loading-gif" src="img/loading.gif">
      </div>
    
    </main>
    
    
    <br>
    <br>
    <br>
    <script type="text/javascript" src="js/storefront.js"></script>
</body>


</html>
