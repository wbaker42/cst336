var correctAnswers = Array('b', 'd', 'c', 'a', 'a');

//LISTENERS
window.onload = startQuiz();

//FUNCTIONS
function startQuiz(){
    $("#errors").hide();
    $("#nameError").hide();
    $("#levelError").hide();
    $("#questionError").hide();
    $("#scoreInfo").hide();
}

$("#submit").click(function(){
    $("#scoreInfo").hide();
    $("#errors").hide();
    $("#nameError").hide();
    $("#levelError").hide();
    $("#questionError").hide();
    $("#score").empty();
    $("#wrongQuestions").empty();
    $("#response").empty();
    if(displayErrorMessages() == 0){
        scoreQuiz();
    }
    
});

function displayErrorMessages(){
    var count = 0;
    $("style").empty();
    if($("#name").val() == ''){
        $("#errors").show();
        $("#nameError").show();
        document.getElementsByTagName("style")[0].innerHTML += "#name{background-color: red;}";
        count++;
    }
        
    if($( "select#level option:checked" ).val() == ''){
        $("#errors").show();
        $("#levelError").show();
        document.getElementsByTagName("style")[0].innerHTML += "#level{background-color: red;}";
        count++;
    }
    blankQuestionCount = 0;
    $("#unansweredQuestions").empty();
    
    for(var i=1; i<=5; i++){
        if ($("input[name=question" + i + "]:checked").val() == undefined){
            $("#errors").show();
            $("#questionError").show();
            blankQuestionCount ++;
            if (blankQuestionCount == 1){
                document.getElementById("unansweredQuestions").innerHTML += " " + i;
            }
            
            else{
                document.getElementById("unansweredQuestions").innerHTML += ", " + i;
            }
            document.getElementsByTagName("style")[0].innerHTML += "#question" + i + "{background-color: red;}";
        }
    }
    
    return count;
}
function scoreQuiz(){
    $("#scoreInfo").show();
    var score = 0;
    var incorrectAnswers = new Array();
    var name = $("#name").val();
    document.getElementById("username").innerHTML += name;
    for(var i=1; i<=5; i++){
        if($("input[name=question" + i + "]:checked").val() == undefined){
            console.log("true")
        }
        var test = (correctAnswers[i-1] == $("input[name=question" + i + "]:checked").val());
        if (test){
            score++;
        }
        else{
            incorrectAnswers.push(i);
        }
    }
    
    document.getElementById("score").innerHTML += score;
    if(score<5){
        if(incorrectAnswers.length > 1){
            document.getElementById("wrongQuestions").innerHTML += "s " + incorrectAnswers[0];
            for(var i=1; i<incorrectAnswers.length; i++){
                if(i == incorrectAnswers.length - 1){
                    document.getElementById("wrongQuestions").innerHTML += ", " + incorrectAnswers[i] + ".";
                }
                else{
                    document.getElementById("wrongQuestions").innerHTML += ", " + incorrectAnswers[i];
                }
            }
        }
        else{
            document.getElementById("wrongQuestions").innerHTML += incorrectAnswers[0] + ".";
        }
        

    }
    
    else{
        $("#displayWrong").hide();
    }
    var response;
    var level = parseInt($( "select#level option:checked" ).val());
    switch(level){
        case 1:
            switch(score){
                case 0:
                    response = "You are wrong, you are not a computer scientist.";
                    break;
                case 1:
                    response =  "You are wrong, you are not a computer scientist.";
                    break;
                case 2:
                    response =  "You are wrong, you are not a computer scientist.";
                    break;
                case 3:
                    response =  "Hmm perhaps you are a computer scientist...";
                    break;
                case 4:
                    response =  "Very good, you are a computer scientist.";
                    break;
                case 5:
                    response =  "Excellent, 100%. Did you go to CSUMB?";
                    break;
            }
            break;
        case 2:
            switch(score){
                case 0:
                    response =  "Well looks like you are right, you are not a computer scientist.";
                    break;
                case 1:
                    response =  "Well looks like you are right, you are not a computer scientist.";
                    break;
                case 2:
                    response =  "Well looks like you are right, you are not a computer scientist.";
                    break;
                case 3:
                    response =  "Hmm, perhaps you should consider pursuing computer science.";
                    break;
                case 4:
                    response =  "You are too humble, you seem to be a computer science.";
                    break;
                case 5:
                    response =  "What a liar.";
                    break;
            }
            break;
        case 3:
            switch(score){
                case 0:
                    response =  "Well that answers that, you are not a computer scientist.";
                    break;
                case 1:
                    response =  "Well that answers that, you are not a computer scientist.";
                    break;
                case 2:
                    response =  "Well that answers that, you are not a computer scientist.";
                    break;
                case 3:
                    response =  "Very good you seemed to score better than you expected.";
                    break;
                case 4:
                    response =  "Hmm, definitely consider pursuing computer science.";
                    break;
                case 5:
                    response =  "Well, why are you so unsure? You are obviously a computer scientist!";
                    break;
            }
            break;
            
            
    }
    
    document.getElementById("response").innerHTML += response;
    
                
}
                    /*if($_POST['question' . ($i)] == $correctAnswers[$i-1]){
                        $score++;
                        
                    }
                    else{
                        array_push($incorrectAnswers, $i);
                    }
                }*/