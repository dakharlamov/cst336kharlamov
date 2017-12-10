<?php
    
    session_start();
    if($_SESSION['loggedin'] == 'n'){
      header('Location: ../adminpage.php');
    }
    
    
    $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf", "3f5421de");
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "UPDATE games SET gametitle = :gtitle, releaseyear = :ryear, genre = :ge, esrb = :eb, rating = :rg, price = :pe WHERE gameid = ".$_GET['gid'].";";
            
    $params = array();
    $params[':gtitle'] = $_GET['title'];
    $params[':ryear'] = $_GET['year'];
    $params[':ge'] = $_GET['genre'];
    $params[':eb'] = $_GET['esrb'];
    $params[':rg'] = $_GET['rating'];
    $params[':pe'] = $_GET['price'];
    

    $response = $dbconn->prepare($query);
    $response->execute($params);

    header('Location: ../adminpage.php');
    
?>