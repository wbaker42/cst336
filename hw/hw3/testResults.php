<?php
    $correctAnswers = array('b', 'd', 'c', 'a', 'a');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Are You a Computer Scientist?</title>

        <style>
            @import url("css/styles.css");
            
        </style>
        <?php
            formatUnansweredQuestion(5);
        ?>
    </head>
    
    <body>
        <nav>
            <a href="index.php">Back</a>
        </nav>
        <?php
            
            function defaultValue($question, $value){
                if($_POST[$question] == $value){
                    if($question != 'level'){
                        return 'checked';
                    }
                    else if($question == 'level'){
                        return 'selected';   
                    }                        
                }
                else if ($question == 'name'){
                    return "'" . $_POST[$question] . "'";
                }
            }
            
            function produceErrorMessage($num){
                $count = 0;
                if($_POST['name'] == ''){
                    $count++;
                }
                    
                if($_POST['level'] == ''){
                    $count++;
                }
                for ($i=1; $i<=$num; $i++){
                    if(!isset($_POST['question' . $i])){
                        $count++;
                    }
                }
                if ($count==0){
                    return 0;
                }
                else{
                    echo"<div id ='errors'>";
                    if($_POST['name'] == ''){
                        echo "Please enter a name.<br>";
                    }
                    
                    if($_POST['level'] == ''){
                        echo "Please select your level.<br>";
                    }
                    for ($i=1; $i<=$num; $i++){    
                        if(!isset($_POST['question' . $i])){
                             echo"Please provide a response to Question " . $i . "<br>";      
                        }
                    }
                    echo"</div><br>";
                }
                return $count;
            }
            
            function formatUnansweredQuestion($num){
                echo"<style>";
                if($_POST['name'] == ''){
                    echo "#name{
                        background-color: red;
                        }";
                }
                    
                if($_POST['level'] == ''){
                    echo "#level{
                        background-color: red;
                        }";
                }
                
                for($i=1; $i<=$num; $i++){    
                    if(!isset($_POST['question' . $i])){
                        echo"#question". $i . "{
                        background-color: red;
                        }";
                    }
                }    
                echo"</style>";
            }
            
            function scoreQuiz($num){
                $score = 0;
                global $correctAnswers;
                $incorrectAnswers = array();
                for($i=1; $i<=$num; $i++){
                    if($_POST['question' . ($i)] == $correctAnswers[$i-1]){
                        $score++;
                        
                    }
                    else{
                        array_push($incorrectAnswers, $i);
                    }
                }
                echo"<h2>" . $_POST['name'] . " You Scored <span id ='score'>$score</span>/5.</h2>";
                if($score<5){
                    echo"<h2>Think More About Questions $incorrectAnswers[0]";
                }
                if($score<4){
                    for($i=1; $i<count($incorrectAnswers); $i++){
                        echo", $incorrectAnswers[$i]";
                    }
                }
                echo".</h2>";
                echo"</div><br>";
                
                echo"<div id='response'>";
                
                switch($_POST['level']){
                    case 1:
                        switch($score){
                            case 0:
                                echo "You are wrong, you are not a computer scientist.";
                                break;
                            case 1:
                                echo "You are wrong, you are not a computer scientist.";
                                break;
                            case 2:
                                echo "You are wrong, you are not a computer scientist.";
                                break;
                            case 3:
                                echo "Hmm perhaps you are a computer scientist...";
                                break;
                            case 4:
                                echo "Very good, you are a computer scientist.";
                                break;
                            case 5:
                                echo "Excellent, 100%. Did you go to CSUMB?";
                                break;
                        }
                        break;
                    case 2:
                        switch($score){
                            case 0:
                                echo "Well looks like you are right, you are not a computer scientist.";
                                break;
                            case 1:
                                echo "Well looks like you are right, you are not a computer scientist.";
                                break;
                            case 2:
                                echo "Well looks like you are right, you are not a computer scientist.";
                                break;
                            case 3:
                                echo "Hmm, perhaps you should consider pursuing computer science.";
                                break;
                            case 4:
                                echo "You are too humble, you seem to be a computer science.";
                                break;
                            case 5:
                                echo "What a liar.";
                                break;
                        }
                        break;
                    case 3:
                        switch($score){
                            case 0:
                                echo "Well that answers that, you are not a computer scientist.";
                                break;
                            case 1:
                                echo "Well that answers that, you are not a computer scientist.";
                                break;
                            case 2:
                                echo "Well that answers that, you are not a computer scientist.";
                                break;
                            case 3:
                                echo "Very good you seemed to score better than you expected.";
                                break;
                            case 4:
                                echo "Hmm, definitely consider pursuing computer science.";
                                break;
                            case 5:
                                echo "Well, why are you so unsure? You are obviously a computer scientist!";
                                break;
                        }
                        break;
                }
                
                
                
            }
            
        ?>

        <h1>Are You a Computer Scientist?</h1>
        <div id="scoreInfo">
            <?php
            //produceErrorMessage(5);
            if(produceErrorMessage(5) == 0){
                echo"<br><div id='stats'>";
                scoreQuiz(5);
                echo'</div><br>';
            }
            ?>
        </div>
        <br>
        <form action ="testResults.php" method = "post">
            <div id="main">
                <div id="topInput"><br>
                <input id = 'name' type="text" name="name" placeholder="Name" value=<?php echo defaultValue('name', 'a')?>>
                <select id = 'level' name="level">
                     <option value="" <?php echo defaultValue('level', "") ?>>- Select -</option>
                     <option value="1" <?php echo defaultValue('level', "1") ?>>I am a computer scientist</option>
                     <option value="2" <?php echo defaultValue('level', "2") ?>>I am not a computer scientist</option>
                     <option value='3' <?php echo defaultValue('level', "3") ?>>I am unsure whether or not I am a computer scientist</option>
                </select><br></div> <br>
            <div id="question1" class = "oddQuestion">
                <h2 class = 'question'>How many bits are in a byte?</h2>
                <input type = "radio" id = "a1" name = "question1" value = "a" <?php echo defaultValue('question1', 'a');?>>
                <label for "a1">1</label><br>
                
                <input type = "radio" id = "b1" name = "question1" value = "b" <?php echo defaultValue('question1', 'b');?>>
                <label for = "b1">8</label><br>
                
                <input type = "radio" id = "c1" name = "question1" value = "c" <?php echo defaultValue('question1', 'c');?>>
                <label for = "c1">12</label><br>
                
                <input type = "radio" id = "d1" name = "question1" value = "d" <?php echo defaultValue('question1', 'd');?>>
                <label for = "d1">100</label><br>
            </div>
            <br>
            <div id="question2" class = "evenQuestion">
                <h2 class = 'question'>What is the following:<br>1001 - 0010?</h2>
                <input type = "radio" id = "a2" name = "question2" value = "a" <?php echo defaultValue('question2', 'a');?>>
                <label for "a2">37</label><br>
                
                <input type = "radio" id = "b2" name = "question2" value = "b" <?php echo defaultValue('question2', 'b');?>>
                <label for = "b2">991</label><br>
                
                <input type = "radio" id = "c2" name = "question2" value = "c" <?php echo defaultValue('question2', 'c');?>>
                <label for = "c2">0100</label><br>
                
                <input type = "radio" id = "d2" name = "question2" value = "d" <?php echo defaultValue('question2', 'd');?>>
                <label for = "d2">7</label><br>
            </div>
            <br>
                <div id="question3" class = "oddQuestion">
                <h2 class = 'question'>What does #BED mean?</h2>
                <input type = "radio" id = "a3" name = "question3" value = "a" <?php echo defaultValue('question3', 'a');?>>
                <label for "a3">Hashtag Sleep</label><br>
                
                <input type = "radio" id = "b3" name = "question3" value = "b" <?php echo defaultValue('question3', 'b');?>>
                <label for = "b3">254</label><br>
                
                <input type = "radio" id = "c3" name = "question3" value = "c" <?php echo defaultValue('question3', 'c');?>>
                <label for = "c3">1011 1110 1101</label><br>
                
                <input type = "radio" id = "d3" name = "question3" value = "d" <?php echo defaultValue('question3', 'd');?>>
                <label for = "d3">A typo.</label><br>
            </div>
            <br>
                <div id="question4" class = "evenQuestion">
                <h2 class = 'question'>How many layers are in the internet layer protocol suite?</h2>
                <input type = "radio" id = "a4" name = "question4" value = "a" <?php echo defaultValue('question4', 'a');?>>
                <label for "a4">4</label><br>
                
                <input type = "radio" id = "b4" name = "question4" value = "b" <?php echo defaultValue('question4', 'b');?>>
                <label for = "b4">5</label><br>
                
                <input type = "radio" id = "c4" name = "question4" value = "c" <?php echo defaultValue('question4', 'c');?>>
                <label for = "c4">7</label><br>
                
                <input type = "radio" id = "d4" name = "question4" value = "d" <?php echo defaultValue('question4', 'd');?>>
                <label for = "d4">2</label><br>
            </div>
            <br>
                <div id="question5" class = "oddQuestion">
                <h2 class = 'question'>A programmer is at work when his wife calls and asks him to go to the store. She says she needs a gallon of milk, and if they have fresh eggs, buy a dozen. He comes home with...</h2>
                <input type = "radio" id = "a5" name = "question5" value = "a" <?php echo defaultValue('question5', 'a');?>>
                <label for "a5">12 Gallons of Milk</label><br>
                
                <input type = "radio" id = "b5" name = "question5" value = "b" <?php echo defaultValue('question5', 'b');?>>
                <label for = "b5">1 Gallon of Milk and 12 Eggs</label><br>
                
                <input type = "radio" id = "c5" name = "question5" value = "c" <?php echo defaultValue('question5', 'c');?>>
                <label for = "c5">12 eggs</label><br>
                
                <input type = "radio" id = "d5" name = "question5" value = "d" <?php echo defaultValue('question5', 'd');?>>
                <label for = "d5">Nothing. He forgets the list.</label><br>
            </div>
            <br>
            <div id = "submit">
            <input type="submit" value="Submit" />
            </div>
            </div>
        </form>
    </body>
</html>