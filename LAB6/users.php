<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        
        
    </head>
    
     <?php
    
        $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf","3f5421de");
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = 'SELECT * FROM user ORDER BY user.firstName;';
        $response = $dbconn->prepare($query);
        $response->execute();
        $data = $response->fetchAll();
        
     ?>
    
    <body>
        <div id="wrapper">
        
            <form>
                <button formaction="adduser.php">Add User</button>
                <button formaction="index.php">Logout</button>
            </form><br>
                
            <table>
                <?php
                
                
                foreach($data as $user){
                    echo '<tr>';
                    echo '<td>'.$user['firstName'].' '.$user['lastName'].'</td>';
                    echo '<td><form><button name="userId" formaction="updateuser.php" value="'.$user['userId'].'">Update</button></form></td>';
                    echo '<td><form method="POST"><button name="userId" formaction="deleteuser.php" value="'.$user['userId'].'">Delete</button></form></td>';
                    echo '</tr>';
                    
                }
                
                
                ?>
            </table>
            
        </div>
    </body>
    
    
    
</html>