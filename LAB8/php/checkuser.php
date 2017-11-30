<?php



        $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf","3f5421de");
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = 'SELECT * FROM usernames WHERE usernames.username = :usrnm;';
            
        $params = array();
        $params[':usrnm'] = $_GET['name'];


        $response = $dbconn->prepare($query);
        $response->execute($params);
        $data = $response->fetchAll();

        $apiResponse = array("result" => "taken");
        
        if(count($data) > 0){
            echo json_encode($apiResponse);
        }else{
            $apiResponse["result"] = "available";
            echo json_encode($apiResponse);
        }
        
?>