<?php

    $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf", "3f5421de");
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = 'SELECT * FROM games LEFT JOIN genres ON games.genre = genres.genreid LEFT JOIN esrbratings ON games.esrb = esrbratings.esrbid;';

    $response = $dbconn->prepare($query);
    $response->execute();
    $data = $response->fetchAll();


    echo json_encode($data);

?>