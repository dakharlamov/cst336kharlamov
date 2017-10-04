<!DOCTYPE html>
<html>
    
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <?php
            
            $elementsNotFilledIn = array();
            
            
            
            if(strlen($_POST['username']) == 0){
                array_push($elementsNotFilledIn, "Username");
            }
            
            if(strlen($_POST['favnumb']) == 0){
                array_push($elementsNotFilledIn, "Favorite Number");
            }
            
            if(strlen($_POST['foods']) == 0){
                array_push($elementsNotFilledIn, "Food");
            }
            if($_POST['foods'] == "other" && strlen($_POST['ifother']) == 0){
                array_push($elementsNotFilledIn, "Specify Other");
            }
                
            if(count($elementsNotFilledIn) == 0){
            ?>
            
            <form id='redirectPOST' action="personalpage.php" method="post">
            <?php
                foreach ($_POST as $a => $b) {
                    echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
                }
            ?>
            </form>
            <script type="text/javascript">
                document.getElementById('redirectPOST').submit();
            </script>
            
            <?php
            }else{
                
                if(count($_POST) > 0){
                    echo 'Please fill out the following fields: ';
                    echo '<ul>';
                    foreach($elementsNotFilledIn as $item){
                        
                        echo '<li>'.$item.'</li>';
                        
                    }
                    echo '</ul>';
                }
            
            ?>
            
            
            <div id="wrapper">
            
                <h1>Personal Page Generator</h1>
                
                <form method="post">
                    <input type="text" placeholder="Username" name="username"/><br><br>
                    What is your favorite number? <input type="number" name="favnumb" min="0" max="255"/><br><br>
                    What is your favorite fruit? <select name="foods">
                        <option value="">Select One</option>
                         <option value="apple">Apples</option>
                         <option value="banana">Bananas</option>
                         <option value="grape">Grapes</option>
                         <option value="strawberry">Strawberries</option>
                         <option value="orange">Oranges</option>
                         <option value="cherry">Cherries</option>
                         <option value="other">Other</option>
                    </select>
                    <input type="text" placeholder="If other, specify..." name="ifother"/><br><br>
                    <div id="cbox"><input type="checkbox" name="isveg" value="true"> Check if you are a vegetarian.</div><br><br>
                    
                    What color do you want your page to be? <input type="color" name="bgcol" value="#ffffff"><br><br>
                    
                    <input type="submit" value="Submit"/>
                </form>
                
            </div>
            
            
            <?php 
            } 
            ?>
        
        </div>
        
    </body>
    
</html>