<!DOCTYPE html>
<html>
    
     <?php
            $backgroundImage = "img/sea.jpg";
            
            $showSlideShow = true;
            include 'api/pixabayAPI.php';
            
            if((isset($_GET['keyword']) || isset($_GET['catagory'])) && (strlen($_GET['keyword']) + strlen($_GET['catagory'])) > 0){
                
                if(isset($_GET['keyword']) && strlen($_GET['keyword']) > 0){
                    $keyword = $_GET['keyword'];
                }
               
                if(isset($_GET['catagory']) && strlen($_GET['catagory']) > 0){
                    $keyword = $_GET['catagory'];
                }
               
                if(isset($_GET['layout']) && strlen($_GET['layout']) > 0){
                    $layout = $_GET['layout'];
                    $imageURLs = getImageURLs($keyword, $layout);
                }else{
                    $imageURLs = getImageURLs($keyword);
                }
               
                $backgroundImage = $imageURLs[array_rand($imageURLs)];
            }else{
                
                $showSlideShow = false;
                
            }
    ?>
        
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage?>');
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>
        
    </head>
    
    
    <body>
        
        <form>
           <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
           or
           <select name = "catagory">
               <option value="">Select One</option>
               <option value="ocean">Sea</option>
               <option value="forest">Forest</option>
               <option value="mountain">Mountain</option>
               <option value="snow">Snow</option>
           </select>
           <br>
           <input type="radio" id="lhorizontal" name="layout" value="horizontal">
           <label for = "Horizontal"></label><label for="lhorizontal">Horizontal</label>
           <input type="radio" id="lvertical" name="layout" value="vertical"/>
           <label for="Vertical"></label><label for="lvertical">Vertical</label>
           <input type="submit" value="Submit"/>
       </form>
        
        <?php
        
            if(!isset($imageURLs) || !$showSlideShow){
                echo "<h2> Type a keyword to display a slideshow <br> with random images from Pixabay.com</h2>";
            }else{
                //Carousel Here
                
        ?>
        
        
        <br>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++){
                        echo '<li data-target="#carousel-example-generic" data-slide-to="$i"';
                        echo ($i == 0) ? ' class="active"' : '';
                        echo '></li>';
                        
                    }
                ?>
            </ol>
            
        
            <div class="carousel-inner" role="listbox">
                <?php
                
                    for($i = 0; $i < 7; $i++){
                        
                        do{
                            $randomIndex = rand(0, count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
                        
                        
                        echo '<div class="item ';
                        echo ($i == 0) ? "active" : "";
                        echo '">';
                        echo '<img src="'.$imageURLs[$randomIndex].'">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
        </div>
            
        
        <?php
            }
        
        ?>
        
       <br>
       
       
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    
    
</html>