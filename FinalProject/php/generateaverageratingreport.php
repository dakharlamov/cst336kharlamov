<?php

    $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf", "3f5421de");
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = 'SELECT AVG(rating) FROM games;';

    $response = $dbconn->prepare($query);
    $response->execute();
    $data = $response->fetchAll();

    $ou = array("avg" => $data[0]['AVG(rating)']);

    echo json_encode($ou);



?>