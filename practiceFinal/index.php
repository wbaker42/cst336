<?=displayHistory()?>

<?php
    session_start();
    include 'connect.php';
    $connect = getDBConnection();
    
    function displayNames(){
        global $connect;
        $sql = "
        SELECT 
        *
        FROM
        superhero
        GROUP BY name
        Order BY lastName";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option value='". $record['name']."'>".$record['firstName'] . " ". $record['lastName'] . "</option>";
        }
    }
    
    function setVariables(){
        global $connect;
        $sql = "
            SELECT 
            *
            FROM
            superhero
            ORDER BY RAND()
            LIMIT 1";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "var imgName = '".$record['image']."';";
            echo "var heroName = '".$record['name']."';";
            echo "var realName = '".$record['firstName']."';";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Super Hero Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script>
                <?=setVariables()?>
        </script>
    
    <body>
        <form>
            <img id='heroImage'>
            <select name="realName" id="realName">
                <option value =''>Select One</option>
                <?=displayNames()?>
            </select>
        <input type="submit" value="Submit" />
        </form>
        <div id="waiting"></div>
        <h1 id="feedback"></h1>
        <h1 id ='test'></h1>
        <div id="times"></div>
        
        <div id="stats">The number of times <span id="name"></span>'s name has been guessed correctly: <span id="totCorrect"></span>.
        <br><br>
        The number of times <span id="name"></span>'s name has been guessed incorrectly: <span id="totIncorrect"></span>.</div>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "js/quiz.js"></script>
    </body>
</html>

