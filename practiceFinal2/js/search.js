$("#historyButton").click(function(){
    $("#searchHistory").show();
    $("#historyButton").hide();
}
)

$("form").submit(function(event) {
    event.preventDefault();
    var name = $("select#name option:checked").val()
    $.ajax({
        type : "get",
        url  : "https://www.omdbapi.com/",            
        dataType : "json",
        
        data : {"s" : name, "apikey": '12215ee6'},            
        
        success : function(data){
            console.log(data);
            console.log(data.Search);
            $("#movieTable").empty();
            for(var i = 0; i<data.Search.length; i++){
                document.getElementById('movieTable').innerHTML += "<tr><td><img class ='thumbnail' src=" + data.Search[i].Poster + "></td><td class='title'>" + data.Search[i].Title + "</td></tr>"
            }
            
            //$("#image").attr('src', data.Search[0].Poster);
            
            //$("#totCorrect").html(data.correctA);
            //$("#totIncorrect").html(data.incorrectA);
            //$("#feedback").css("display", "block");
           // $("#waiting").html("");
            $("input[type='submit']").css("display", "");
        },
        complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
        }

    });//AJAX
    //$("#name").empty();
    //document.getElementById('name').innerHTML = heroName;
    //$("#stats").show();
})