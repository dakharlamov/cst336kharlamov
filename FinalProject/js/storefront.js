
window.onload = loadGameList();


$("#refreshbtn").click(function(){
    
   loadGameList(); 
});


$("#searchbtn").click(function(){
    
    var search = $("#searchquery").val();
    
    $.ajax({
    
        type: "GET",
        url: "php/fetchspecificgame.php",
        dataType: "json",
        data: { "que" : search },
        success: function(data, status) {
            $("#game-list").empty();
            
            var tableString = "";
            
            tableString += '<table id="games-table">';
            
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
                tableString += '<button class="btn btn-info" value="' + game["gameid"] + '">Add to Cart</button>';
                tableString += '</td>';
                tableString += '</tr>';
                
            });
            
            tableString += '</table>';
            
            
            $("#game-list").append(tableString);
    
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
            
            var tableString = "";
            
            tableString += '<table id="games-table">';
            
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
                tableString += '<button class="btn btn-info" value="' + game["gameid"] + '">Add to Cart</button>';
                tableString += '</td>';
                tableString += '</tr>';
                
            });
            
            tableString += '</table>';
            
            
            $("#game-list").append(tableString);
    
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }
    
    });
}