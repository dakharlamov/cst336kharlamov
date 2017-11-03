<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
     <?php
    
        $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf","3f5421de");
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        if(isset($_POST['deleteConfirm'])){
            
            $queryD = 'DELETE FROM user WHERE user.userId = :usrID;';
            
            $paramsD = array();
            $paramsD[':usrID'] = $_GET['userId'];
            
            
            $responseD = $dbconn->prepare($queryD);
            $responseD->execute($paramsD);
            
            header('Location: users.php');
            
        }else{
        
            $query = 'SELECT * FROM user WHERE user.userId = :usrID;';
            
            $params = array();
            $params[':usrID'] = $_POST['userId'];
            
            $response = $dbconn->prepare($query);
            $response->execute($params);
            $data = $response->fetchAll();
        }   
     ?>
    
    <body>
        
        <h1>Are you sure that you wish to delete <?php echo $data[0]['firstName'].' '.$data[0]['firstName']; ?></h1>
        <form method="POST">
            <button formaction=<?php echo '"deleteuser.php?userId='.$_POST['userId'].'"'; ?> name="deleteConfirm" value="true">DELETE</button>
            <button formaction="users.php">CANCEL</button>
        </form>
        
        
        
    </body>
    
</html>