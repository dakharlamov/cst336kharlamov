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
    if($_SESSION['loggedin'] == 'n'){
      header('Location: adminpage.php');
    }
    
    $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf", "3f5421de");
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = 'SELECT * FROM games LEFT JOIN genres ON games.genre = genres.genreid LEFT JOIN esrbratings ON games.esrb = esrbratings.esrbid WHERE gameid = :ggid;';

    $params = array();
    $params[':ggid'] = $_GET['gid'];
    

    $response = $dbconn->prepare($query);
    $response->execute($params);
    $data = $response->fetchAll();
    
    
    $genreQuery = 'SELECT * FROM genres;';
    
    $genreResponse = $dbconn->prepare($genreQuery);
    $genreResponse->execute();
    
    $genreData = $genreResponse->fetchAll();
    
    
    $esrbQuery = 'SELECT * FROM esrbratings;';
    
    $esrbResponse = $dbconn->prepare($esrbQuery);
    $esrbResponse->execute();
    
    $esrbData = $esrbResponse->fetchAll();
    

    $tableString = "";
    $tableString .= '<form method="GET" action="php/addgamerow.php"><table id="games-table">';
            
    $tableString .= '<tr>';
    $tableString .= '<th>';
    $tableString .= 'Title';
    $tableString .= '</th>';
    $tableString .= '<td>';
    $tableString .= '<input type="text" name="title">';
    $tableString .= '</td>';
    $tableString .= '</tr>';
    $tableString .= '<tr>';
    $tableString .= '<th>';
    $tableString .= 'Release Year';
    $tableString .= '</th>';
    $tableString .= '<td>';
    $tableString .= '<input type="number" name="year">';
    $tableString .= '</td>';
    $tableString .= '</tr>';
    $tableString .= '<tr>';
    $tableString .= '<th>';
    $tableString .= 'Genre';
    $tableString .= '</th>';
    $tableString .= '<td>';
    $tableString .= '<select name="genre">';
    
    foreach($genreData as $elem){
        $tableString .= '<option value="'.$elem["genreid"].'">'.$elem["genre"].'</option>';
    }
    
    $tableString .= '</select>';
    $tableString .= '</td>';
    $tableString .= '</tr>';
    $tableString .= '<tr>';
    $tableString .= '<th>';
    $tableString .= 'ESRB';
    $tableString .= '</th>';
    $tableString .= '<td>';
    
    $tableString .= '<select name="esrb">';
    
    foreach($esrbData as $elem){
        $tableString .= '<option selected="selected" value="'.$elem["esrbid"].'">'.$elem["esrbrating"].'</option>';
    }
    
    $tableString .= '</select>';
    
    $tableString .= '</td>';
    $tableString .= '</tr>';
    $tableString .= '<tr>';
    $tableString .= '<th>';
    $tableString .= 'MetaRating';
    $tableString .= '</th>';
    $tableString .= '<td>';
    $tableString .= '<input type="number" name="rating">';
    $tableString .= '</td>';
    $tableString .= '</tr>';
    $tableString .= '<tr>';
    $tableString .= '<th>';
    $tableString .= 'Price';
    $tableString .= '</th>';
    $tableString .= '<td>';
    $tableString .= '<input type="text" name="price">';
    $tableString .= '</td>';
    $tableString .= '</tr>';
    $tableString .= '<th>';
    $tableString .= '</th>';
    $tableString .= '<td>';
    $tableString .= '<button type="submit" class="btn btn-success">Add</button>';
    $tableString .= '</td>';
    $tableString .= '</tr>';
        
    
    $tableString .= '</table></form>';
    
    
    
    
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
            <a class="nav-link active" href="adminpage.php">Back <span class="sr-only">(current)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/adminlogout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    
    <main role="main" class="container">
      
      <div id="game-list">
        <?php
            echo $tableString;
        ?>
      </div>
    
    </main>
    
</body>


</html>
