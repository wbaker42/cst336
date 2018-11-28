var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile"},
             { word: "monkey", hint: "It's a mammal"},
             { word: "beetle", hint: "It's an insect"}];

var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 
                'Y', 'Z']
//LISTENERS
window.onload = startGame();

//FUNCTIONS
function startGame(){
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    createHintButton();
    remainingGuesses = 6;
}

//Fill board with underscores
function initBoard(){
    for(var letter in selectedWord){
        board.push("_");
    }
}

function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard(){
    $('#word').empty();
    
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("<br />");
    /*$("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");*/
}

function createHintButton(){
    $("#hint").append("<button class='btn btn-info' id='hintButton'>Hint!</button>");
    $("#hint").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    $("#hintButton").show();
    $(".hint").hide();
}

//Creates the letters inside the letters div
function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter btn btn-success' id='" + letter +"'>" + letter + "</button>");
    }
}


$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$("#hintButton").click(function(){
    $("#hintButton").hide();
    $(".hint").show();
    remainingGuesses -= 1;
    updateMan();
    if (remainingGuesses <= 0){
        endGame(false);
    }
    
});

$(".replayBtn").on("click", function(){
    location.reload();
});

function checkLetter(letter){
    var positions = new Array();
    
    //Put all the positions the letter exists in an array
    for (var i = 0; i < selectedWord.length; i++){
        console.log(selectedWord)
        if (letter == selectedWord[i]){
            positions.push(i);
        }
    }    
    if (positions.length > 0){
        updateWord(positions, letter);
        
        //Check to see if it is a winning guess
        if (!board.includes('_')){
            endGame(true);
        }
    } else{
        remainingGuesses -= 1;
        updateMan();
    }
    
    if (remainingGuesses <= 0){
        endGame(false);
    }
    
}

//Update the current word then calls for a board update
function updateWord(positions, letter){
    for (var pos of positions){
        board[pos] = letter;
    }
    
    updateBoard();
}

//Calculates and updates the image for our stick man
function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//Ends the game by hiding game divs and displaying the win or loss divs
function endGame(win){
    $("#letters").hide();
    $(".hint").hide();
    $("#hintButton").hide();
    if (win) {
        $('#won').show();
    }else{
        $('#lost').show();
    }
    
}

function disableButton(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}



