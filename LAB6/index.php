<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <?php
    
        $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf","3f5421de");
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $displayLogin = true;
        
    
        if(isset($_POST['username']) && isset($_POST['password'])){
            
            $query = "SELECT admin_id FROM admin a WHERE a.username = :username AND a.password = :password AND a.admin_id IS NOT NULL;";
            
            $params = array();
            
            $params[':username'] = $_POST['username'];
            $params[':password'] = sha1($_POST['password']);
            
            $response = $dbconn->prepare($query);
            $response->execute($params);
            $data = $response->fetchAll();
            
            if(count($data) == 0)
                echo '<div class="error">Wrong username or password! Try again</div>';
            else
                header('Location: users.php');
            
            
        }else if(isset($_POST['username']) || isset($_POST['password'])){
            echo '<div class="error">Wrong username or password! Try again</div>';
        }
        
    ?>
    
    <?php if($displayLogin){ ?>
    <body>
        <div id="wrapper">
        
            <h1>Admin Login</h1><br>
            <form method="POST">
                <input type="text" name="username" placeholder="Username"/><br><br>
                <input type="password" name="password" placeholder="Password"/><br><br>
                <input type="submit" value="Submit"/>
            </form>
            
            
        </div>
    </body>
    <?php }else{ ?>
    <body>
        
    </body>
    <?php } ?>
    
    
    
</html>