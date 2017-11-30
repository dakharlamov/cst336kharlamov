$("#zip-input").change(function(){
    
    $.ajax({

            type: "GET",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
            dataType: "json",
            data: { "zip_code": $("#zip-input").val() },
            success: function(data,status) {
                $("#error").empty();
                $("#city").empty();
                $("#lat").empty();
                $("#long").empty();
                $("#city").append("City: ");
                $("#lat").append("Latitude: ");
                $("#long").append("Longitude: ");
                if(data["city"]){
                    $("#city").append(data["city"]);
                    $("#lat").append(data["latitude"]);
                    $("#long").append(data["longitude"]);
                }else{
                    $("#error").append("Could not find zipcode!");
                }

            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

    });
    
    
});

$("#state-input").change(function(){
    
     $.ajax({

            type: "GET",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
            dataType: "json",
            data: { "state": $("#state-input").val() },
            success: function(data,status) {
                $("#county-selector").empty();
                if(data["counties"]){
                    
                    data["counties"].forEach(function(element){
                        
                        $("#county-selector").append('<option value="' + element["county"] + '">' + element["county"] + '</option>');
                        
                    });
                    
                    
                }else{
                    $("#county-selector").append("Invalid State");
                }

            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

    });
    
});


$("#username").change(function(){
    
     $.ajax({

            type: "GET",
            url: "php/checkuser.php",
            dataType: "json",
            data: { "name": $("#username").val() },
            success: function(data,status) {
                $("#status").empty();
                
                if(data["result"] == "taken"){
                    $("#status").append('<span style="color:red;">Username is taken!</span>');
                }else{
                    $("#status").append('<span style="color:green;">Username is available!</span>');
                }

            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

    });
    
});

$("#submit").click(function(){
    
    if($("#passA").val() == $("#passB").val()){
        
        alert("Passwords do not match!");
        
    }
    
});