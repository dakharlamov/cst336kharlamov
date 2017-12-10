
window.onload = loadGameList();


$("#avgpricereport").click(function(){
   
   $("#reports").empty();
   
    $.ajax({
    
        type: "GET",
        url: "php/generateaveragereport.php",
        dataType: "json",
        data: { "" : "" },
        success: function(data, status) {
            
            var priceFormat = new Intl.NumberFormat('en-US',
                        { style: 'currency', currency: 'USD',
                          minimumFractionDigits: 2 });
            
            $("#reports").append("Average Price: " + priceFormat.format(data['avg']));
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }
    
    });
   
});

$("#avgratingreport").click(function(){
   
   $("#reports").empty();
   
    $.ajax({
    
        type: "GET",
        url: "php/generateaverageratingreport.php",
        dataType: "json",
        data: { "" : "" },
        success: function(data, status) {
            
            $("#reports").append("Average MetaRaing: " + data['avg']);
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }
    
    });
   
});

$("#avgyearreport").click(function(){
   
   $("#reports").empty();
   
    $.ajax({
    
        type: "GET",
        url: "php/generateaverageyearreport.php",
        dataType: "json",
        data: { "" : "" },
        success: function(data, status) {
            
            $("#reports").append("Average Year: " + data['avg']);
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }
    
    });
   
});

function loadGameList(){
    
    $.ajax({
    
        type: "GET",
        url: "php/fetchgame.php",
        dataType: "json",
        data: { "" : "" },
        success: function(data, status) {
            $("#game-list").empty();
            
            $("#game-list").append('<form method="GET" action="addgame.php"><button type="submit" class="btn btn-success">Add Game</button></form><br>');
            
            var tableString = "";
            
            tableString += '<form method="GET" action="editgame.php"><table id="games-table">';
            
            tableString += '<tr>';
            tableString += '<th>';
            tableString += 'Title';
            tableString += '</th>';
            tableString += '<th>';
            tableString += 'Release Year';
            tableString += '</th>';
            tableString += '<th>';
            tableString += 'Genre';
            tableString += '</th>';
            tableString += '<th>';
            tableString += 'ESRB';
            tableString += '</th>';
            tableString += '<th>';
            tableString += 'MetaRating';
            tableString += '</th>';
            tableString += '<th>';
            tableString += 'Price';
            tableString += '</th>';
            tableString += '<th>';
            tableString += '</th>';
            tableString += '</tr>';
            
            data.forEach(function(game){
                
                tableString += '<tr>';
                tableString += '<td>';
                tableString += game["gametitle"];
                tableString += '</td>';
                tableString += '<td>';
                tableString += game["releaseyear"];
                tableString += '</td>';
                tableString += '<td>';
                tableString += game["genre"];
                tableString += '</td>';
                tableString += '<td>';
                tableString += '<img class="esrb-images" src="img/'+ game["esrbrating"] + '.png">';
                tableString += '</td>';
                tableString += '<td>';
                tableString += game["rating"];
                tableString += '</td>';
                tableString += '<td>';
                tableString += game["price"];
                tableString += '</td>';
                tableString += '<td>';
                tableString += '<button type="submit" name="gid" class="btn btn-warning" value="' + game["gameid"] + '">Edit</button>';
                tableString += '</td>';
                tableString += '</tr>';
                
            });
            
            tableString += '</table></form>';
            
            
            $("#game-list").append(tableString);
    
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }
    
    });
}