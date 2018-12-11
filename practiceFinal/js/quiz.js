$("#heroImage").attr('src', "img/superheroes/" + imgName + ".png");
$("#heroImage").show();

$("form").submit(function(event) {
    event.preventDefault();
    $("#test").empty();
    var answer = $("select#realName option:checked").val();
    //document.getElementById("test").innerHTML = answer;
    $("#feedback").empty();
    var correct = 0;
    var incorrect = 0;
    if (answer==""){
        
        document.getElementById("feedback").style.color = "red";
        document.getElementById("feedback").innerHTML = "Please guess " + heroName + "'s name.";    
    }
    
    else{
        if(answer == heroName){
            document.getElementById("feedback").style.color = "green";
            document.getElementById("feedback").innerHTML = "You are correct. That is " + heroName + "'s real name.";
            correct++;
        }
        
        else{
        document.getElementById("feedback").style.color = "red";
           document.getElementById("feedback").innerHTML = "You are incorrect. That is not " + heroName + "'s name.";   
           incorrect++;
        }
    }
    $("#feedback").show();
    $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
    $("input[type='submit']").css("display", "none");
    
    //Submits and stores score, retrieves average score
    $.ajax({
        type : "post",
        url  : "submitScores.php",            
        dataType : "json",
        
        data : {"heroName" : heroName, "correct": correct, "incorrect": incorrect},            
        
        success : function(data){
            console.log(data);
            //$("#times").html(data.times);
            $("#totCorrect").html(data.correctA);
            $("#totIncorrect").html(data.incorrectA);
            //$("#feedback").css("display", "block");
            $("#waiting").html("");
            $("input[type='submit']").css("display", "");
        },
        complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
        }

    });//AJAX
    $("#name").empty();
    document.getElementById('name').innerHTML = heroName;
    $("#stats").show();
})