<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <body>
        <div id="wrapper">
        
        <?php
        
        $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf","3f5421de");
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        function validate($inputs){
            
            
            
            if(strlen($inputs['firstName']) > 0){
                
            }else{
                return false;
            }
                
            if(strlen($inputs['lastName']) > 0){
                
            }else{
                return false;
            }
            
            if(strlen($inputs['email']) > 0){
                
            }else{
                return false;
            }
            
            if(strlen($inputs['phoneNum']) > 0){
                
            }else{
                return false;
            }
            
            
            if(strlen($inputs['role']) > 0){
                
            }else{
                return false;
            }
            
            if(strlen($inputs['department']) > 0){
                
            }else{
                return false;
            }
            
            return true;
            
        }
        
        if(isset($_POST['updateUser'])){
            
            if(!validate($_POST)){
                echo '<div class="error">Please complete all fields</div>';
            }else{
                
                
                
                $query = "UPDATE user SET firstName = :fName, lastName = :lName, email = :eml, phone = :phn, role = :role, deptId = :dptId WHERE userId = ".$_GET['userId'].";";
            
                $params = array();
                $params[':fName'] = $_POST['firstName'];
                $params[':lName'] = $_POST['lastName'];
                $params[':eml'] = $_POST['email'];
                $params[':phn'] = $_POST['phoneNum'];
                $params[':role'] = $_POST['role'];
                $params[':dptId'] = $_POST['department'];
                
                $response = $dbconn->prepare($query);
                $response->execute($params);
                
                echo '<div class="success">Successfully updated user '.$_POST['firstName'].' '.$_POST['lastName'].'</div>';
                
            }
        }
        
        $userQuery = "SELECT * FROM user WHERE userId = ".$_GET['userId'].";";
        
        $userResponse = $dbconn->prepare($userQuery);
        $userResponse->execute();
        
        $userData = $userResponse->fetchAll();
        
        ?>
        
        <form method="POST">
            <h1>Tech Checkout System: Update a User</h1><br>
            First Name:<input type="text" name="firstName" value=<?php echo '"'.$userData[0]['firstName'].'"'; ?> />
            <br />
            Last Name:<input type="text" name="lastName" value=<?php echo '"'.$userData[0]['lastName'].'"'; ?>/>
            <br/>
            Email: <input type= "email" name ="email" value=<?php echo '"'.$userData[0]['email'].'"'; ?>/>
            <br/>
            Phone Number: <input type ="text" name= "phoneNum" value=<?php echo '"'.$userData[0]['phone'].'"'; ?>/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select>
            <br />
            Department: 
            <select name="department">
                <option value="" > Select One </option>
                <?php
                
                $deptQuery = "SELECT * FROM department";
                
                $deptResponse = $dbconn->query($deptQuery);
                
                $deptArray = $deptResponse->fetchAll();
                
                foreach($deptArray as $dt){
                    
                    echo '<option value="'.$dt['departmentId'].'">'.$dt['deptName'].'</option>';
                    
                }
                
                ?>
            </select>
            
            
            <input type="submit" value="Update User" name="updateUser" formaction=<?php echo '"updateuser.php?userId='.$_GET['userId'].'"'; ?> >
        </form>
        
        <br>
        <form>
        <input type="submit" value="Back" name="back" formaction="users.php">
        </form>
        
        </div>
    </body>
    
    
</html>