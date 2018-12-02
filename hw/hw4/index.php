
<!DOCTYPE html>
<html>
    <head>
        <title>Are You a Computer Scientist?</title>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style></style>
    </head>
    
    <body>
        
        <h1>Are You a Computer Scientist?</h1>
        <div id ='errors'><span id = "nameError">Please enter a name.</span><br>
                          <span id = "levelError">Please select your level.<br>
                          <span id = "questionError">Please provide a response to Question<span id = "unansweredQuestions"></span>.<br></span>
        </div>

        <div id="scoreInfo">
            <br>
            <div id='stats'>
                <h2><span id="username"></span> You Scored <span id ='score'></span>/5.</h2>
                <h2 id="displayWrong">Think More About Question<span id="wrongQuestions"></span></h2></div><br>
                <div id='response'></div><br>
            </div>        
            <div id="main"> 
                <div id="topInput"><br>
                <input type="text" id ="name" placeholder="Name">
                <select id ="level" ></div>
                     <option value="">- Select -</option>
                     <option value=1>I am a computer scientist</option>
                     <option value=2>I am not a computer scientist</option>
                     <option value=3>I am unsure whether or not I am a computer scientist</option>
                </select><br>
                </div><br>
                <div id="question1" class="oddQuestion">
                    <h2 class = 'question'>How many bits are in a byte?</h2>
                    <input type = "radio" id = "a1" name = "question1" value = "a">
                    <label for "a1">1</label><br>
                    
                    <input type = "radio" id = "b1" name = "question1" value = "b">
                    <label for = "b1">8</label><br>
                    
                    <input type = "radio" id = "c1" name = "question1" value = "c">
                    <label for = "c1">12</label><br>
                    
                    <input type = "radio" id = "d1" name = "question1" value = "d">
                    <label for = "d1">100</label><br>
                </div>
                <br>
                <div id="question2" class="evenQuestion">
                    <h2 class = 'question'>What is the following:<br>1001 - 0010?</h2>
                    <input type = "radio" id = "a2" name = "question2" value = "a">
                    <label for "a2">37</label><br>
                    
                    <input type = "radio" id = "b2" name = "question2" value = "b">
                    <label for = "b2">991</label><br>
                    
                    <input type = "radio" id = "c2" name = "question2" value = "c">
                    <label for = "c2">0100</label><br>
                    
                    <input type = "radio" id = "d2" name = "question2" value = "d">
                    <label for = "d2">7</label><br>
                </div>
                <br>
                <div id="question3" class="oddQuestion">
                    <h2 class = 'question'>What does #BED mean?</h2>
                    <input type = "radio" id = "a3" name = "question3" value = "a">
                    <label for "a3">Hashtag Sleep</label><br>
                    
                    <input type = "radio" id = "b3" name = "question3" value = "b">
                    <label for = "b3">254</label><br>
                    
                    <input type = "radio" id = "c3" name = "question3" value = "c">
                    <label for = "c3">1011 1110 1101</label><br>
                    
                    <input type = "radio" id = "d3" name = "question3" value = "d">
                    <label for = "d3">A typo.</label><br>
                </div>
                <br>
                <div id="question4" class="evenQuestion">
                    <h2 class = 'question'>How many layers are in the internet layer protocol suite?</h2>
                    <input type = "radio" id = "a4" name = "question4" value = "a">
                    <label for "a4">4</label><br>
                    
                    <input type = "radio" id = "b4" name = "question4" value = "b">
                    <label for = "b4">5</label><br>
                    
                    <input type = "radio" id = "c4" name = "question4" value = "c">
                    <label for = "c4">7</label><br>
                    
                    <input type = "radio" id = "d4" name = "question4" value = "d">
                    <label for = "d4">2</label><br>
                </div>
                <br>
                <div id="question5" class="oddQuestion">
                    <h2 class = 'question'>A programmer is at work when his wife calls and asks him to go to the store. She says she needs a gallon of milk, and if they have fresh eggs, buy a dozen. He comes home with...</h2>
                    <input type = "radio" id = "a5" name = "question5" value = "a">
                    <label for "a5">12 Gallons of Milk</label><br>
                    
                    <input type = "radio" id = "b5" name = "question5" value = "b">
                    <label for = "b5">1 Gallon of Milk and 12 Eggs</label><br>
                    
                    <input type = "radio" id = "c5" name = "question5" value = "c">
                    <label for = "c5">12 eggs</label><br>
                    
                    <input type = "radio" id = "d5" name = "question5" value = "d">
                    <label for = "d5">Nothing. He forgets the list.</label><br>
                </div>
                <br>
                <div id = "submit">
                <button id="submit">Submit</button>
                </div>
            </div>
            
        <script src="js/quiz.js"></script>
    </body>
</html>