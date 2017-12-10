<?php
    
    session_start();
    if($_SESSION['loggedin'] == 'n'){
      header('Location: ../adminpage.php');
    }
    
    
    $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf", "3f5421de");
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = 'DELETE FROM games WHERE gameid = '.$_GET['gid'].';';
    

    $response = $dbconn->prepare($query);
    $response->execute();

    header('Location: ../adminpage.php');
    
?>