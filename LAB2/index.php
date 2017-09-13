<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <body>
    
    <div id="wrapper">
    
        <p>
            Three Js in a row or any other combo = 0 points.<br>
            Three C++ in a row = 250 points.
            Three Java in a row = 500 points.
            Three PhP in a row = 1000 points.
        </p>
        
        
        <table>
            <tr>
        <?php
        
        $slot_1 = '<td><img src="img/cpp.png"></img></td>';
        $slot_2 = '<td><img src="img/java.png"></img></td>';
        $slot_3 = '<td><img src="img/js.png"></img></td>';
        $slot_4 = '<td><img src="img/php.png"></img></td>';
        
        $score_cpp = 250;
        $numCpp = 0;
        $score_java = 500;
        $numJava = 0;
        $score_php = 1000;
        $numPhp = 0;
        
        for($i = 0; $i < 3; $i++)
        {
            $random_slot = rand(0, 3);
            switch($random_slot)
            {
                case 0:
                    $numCpp++;
                    echo $slot_1;
                    break;
                case 1:
                    $numJava++;
                    echo $slot_2;
                    break;
                case 2:
                    echo $slot_3;
                    break;
                case 3:
                    $numPhp++;
                    echo $slot_4;
                    break;
                default:
                    echo $slot_3;
                    break;
                
            }
        }
        
        echo '</tr>
        </table>';
        
        if($numCpp == 3)
        {
            echo '<strong>Score: '.$score_cpp.'</strong>';
        }
        else if($numJava == 3)
        {
            echo '<strong>Score: '.$score_java.'</strong>';
        }
        else if($numPhp == 3)
        {
            echo '<strong>Score: '.$score_php.'</strong>';
        }
        else
        {
            echo '<strong>Score: 0</strong>';
        }
        
        ?>
        
        <form action="index.php">
          <input type="submit" value="Play Again">
        </form> 
        
        
        
        </div>
    </body>
</html>