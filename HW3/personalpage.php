<!DOCTYPE html>
<html>
    
    <?php
    
    function clamp($num){
        
        if($num > 255)
            return 255;
        if($num < 0)
            return 0;
        return $num;
    }
    
    function decToCol($str){
        
        $pRed = dechex($str);
        
        $greenShift = abs($str * sin(($str * M_PI)/255));
        
        $pGreen = dechex($str - $greenShift);
        
        $blueShift = abs($str * cos(($str * M_PI)/255));
        
        $pBlue = dechex($str - $blueShift);
        
        $r = strlen($pRed) == 2 ? $pRed : '0'.$pRed;
        $g = strlen($pGreen) == 2 ? $pGreen : '0'.$pGreen;
        $b = strlen($pBlue) == 2 ? $pBlue : '0'.$pBlue;
        
        
        $result = '#'.$r.$g.$b;
        return $result;
        
    }
    
    ?>
    
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    
    <body <?php echo 'style="background-color:'.$_POST['bgcol'].'"'; ?>>
        
        <div id="wrapper">
        
            <div class="ptext">
                <h1>
                Welcome to your personal site, 
                <?php
                echo $_POST['username'];
                ?>!
                </h1>
            </div class="ptex">
            <br>
            <br>
            
            <?php
            
            
            include 'api/pixabayAPI.php';
            
            $favfood = $_POST['foods'];
            if($favfood == "other"){
            
                $favfood = $_POST['ifother'];
                
            }
            
            $imageURLs = getImageURLs($favfood);
            
            echo '<img src="'.$imageURLs[0].'">';
            
            ?>
        
            
            
            <div id="fcol" style=<?php echo '"background-color:'.decToCol($_POST['favnumb']).';"'; ?>>
                <div class="ptext">
                This is your favorite number in color form:
                </div>
                &nbsp;
            </div>
            <div class="ptext">
            Here is some more food:
            </div>
            <br>
            
            <?php
                
                $key = ($_POST['isveg']) ? "Vegetables" : "Steak";
                
                $imageURLs = getImageURLs($key);
            
                echo '<img src="'.$imageURLs[0].'">';
            
            ?>
        
        
        </div>
        
    </body>
    
</html>