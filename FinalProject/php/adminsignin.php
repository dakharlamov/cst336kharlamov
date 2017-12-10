<?php
    
    
    $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf", "3f5421de");
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = 'SELECT * FROM admin WHERE admin.username = :un AND admin.password = :pass;';

    $params = array();
    $params[':un'] = $_POST['inputUser'];
    $params[':pass'] = sha1($_POST['inputPassword']);
    

    $response = $dbconn->prepare($query);
    $response->execute($params);
    $data = $response->fetchAll();

    if(count($data) > 0){
        session_start();
        $_SESSION['loggedin'] = "y";
        header('Location: ../admincontrolpanel.php');
    }else{
        header('Location: ../adminpage.php');
    }
    
    
?>