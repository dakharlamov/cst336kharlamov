<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <?php

        $dbconn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_591054388ef3377",  "bb35e80e614baf","3f5421de");
        
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $devices = $dbconn->query("SELECT deviceName, deviceType, price, status FROM device"); 
        
        
        
        $dev = $devices->fetchAll();
        
        $filter = strtoupper($_GET['filter']);
        
        $filterBy = $_GET['filterby'];
        
        $satDev = array();
        
        if(strlen($filter) > 0 || strlen($_GET['filterN']) > 0 || strlen($_GET['filterT']) > 0 || strlen($_GET['filterA']) > 0){
            foreach($dev as $val) {
                
                if(strlen($_GET['filterN']) > 0){
                    if(strtoupper($val['deviceName']) == strtoupper($_GET['filterN'])){
                        $satDev[] = $val;
                    }
                }else if(strlen($_GET['filterT']) > 0){
                    if(strtoupper($val['deviceType']) == strtoupper($_GET['filterT'])){
                        $satDev[] = $val;
                    }
                }else if(strlen($_GET['filterA']) > 0){
                    if(strtoupper($val['status']) == strtoupper($_GET['filterA'])){
                        $satDev[] = $val;
                    }
                }else if($filterBy == 'name'){
                    if(strtoupper($val['deviceName']) == $filter){
                        $satDev[] = $val;
                    }
                }else if($filterBy == 'type'){
                    if(strtoupper($val['deviceType']) == $filter){
                        $satDev[] = $val;
                    }
                }else if($filterBy == 'avail'){
                    if(strtoupper($val['status']) == $filter){
                        $satDev[] = $val;
                    }
                }
            }
        }else{
            
            $satDev = $dev;
            
        }
        
        
        
        
        function sortByVal($a, $b){
            if($_GET['sortby'] == 'price'){
                
                return (1000000 * $a['price']) - (1000000 * $b['price']);
                
            }
                return strcmp(strtoupper($a['deviceName']), strtoupper($b['deviceName']));
        }
        
        usort($satDev, 'sortByVal');
        
        
        function uniqueByKey($array, $key){
            
            $save = array();
            $saveKey = array();
            
            for($x = 0; $x < count($array); $x++){
                
                if(!in_array(strtoupper($array[$x][$key]), $saveKey)){
                    
                    $saveKey[$x] = strtoupper($array[$x][$key]);
                    $save[$x] = $array[$x];
                }
                
            }
            return $save;
        }
    
    ?>
    
    <body>
        
        <div id="input-form">
            <form>
                Sort by:<br>
                <input type="radio" name="sortby" value="name" checked="checked"/>Name<br>
                <input type="radio" name="sortby" value="price"/>Price<br>
                <hr>
                <input type="radio" name="filterby" value="name" checked="checked"/>Name
                <input type="radio" name="filterby" value="type"/>Type
                <input type="radio" name="filterby" value="avail"/>Availability
                <input type="text" name="filter" placeholder="filter"/><br>
                or<br>
                <select name="filterN">
                    <option value="">Filter Name</option>
                    <?php
                    
                    $nameOptions = uniqueByKey($dev, 'deviceName');
                    
                    foreach($nameOptions as $opt){
                        echo '<option value="'.strtoupper($opt['deviceName']).'">'.$opt['deviceName'].'</option>';    
                    }
                    
                    ?>
                </select>
                or
                <select name="filterT">
                    <option value="">Filter Type</option>
                    <?php
                    
                    $nameOptions = uniqueByKey($dev, 'deviceType');
                    
                    foreach($nameOptions as $opt){
                        echo '<option value="'.strtoupper($opt['deviceType']).'">'.$opt['deviceType'].'</option>';    
                    }
                    
                    ?>
                </select>
                or
                <select name="filterA">
                    <option value="">Filter Availability</option>
                    <?php
                    
                    $nameOptions = uniqueByKey($dev, 'status');
                    
                    foreach($nameOptions as $opt){
                        echo '<option value="'.strtoupper($opt['status']).'">'.$opt['status'].'</option>';    
                    }
                    
                    ?>
                </select><br>
                <input type="submit" value="Submit" action="index.php"/>
            </form>
        </div>
        <br>
        <table>
            <tr>
                <th>
                    Device Name
                </th>
                <th>
                    Device Type
                </th>
                <th>
                    Device Price
                </th>
                <th>
                    Device Status
                </th>
            </tr>
            <?php
            
            for($i = 0 ; $i < count($satDev); $i++){
                //TODO: add sort arrows
                echo '<tr>';
                echo '<td>';
                echo $satDev[$i]['deviceName'];
                echo '</td>';
                echo '<td>';
                echo $satDev[$i]['deviceType'];
                echo '</td>';
                echo '<td>';
                echo $satDev[$i]['price'];
                echo '</td>';
                echo '<td>';
                echo ucfirst($satDev[$i]['status']);
                echo '</td>';
                echo '</tr>';
                
            }
            
            
            ?>
                
        </table>
        
        
        
    </body>
    
</html>