<!DOCTYPE html>
<?php


    if($_POST['passA'] == $_POST['passB']){
        
         echo "Sign up successful";
        
    }else{
        
        echo "Passwords did not match";
        
    }
?>
<html>
    <body>
        <form>
            <input type="submit" formaction="../index.html" value="Back"/>
        </form>
    </body>
    
</html>

