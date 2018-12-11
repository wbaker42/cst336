<?php
    session_start();
    include 'connect.php';
    $connect = getDBConnection();

    session_start();
    if (!isset($_SESSION['recent'])){
        $_SESSION['recent'] = array();
    }

    if(isset($_GET['name'])){
        
        //Creating an array to hold an item's properties
        $newItem = $_GET['name']; 
        array_push($_SESSION['recent'], $newItem);
       /* foreach ($_SESSION['recent'] as &$item){
            if ($newItem == $item) {
                $found = true;
            }
        }
        
        //Else add it to array
        if($found != true) {
            
        }*/
    }

    function displayNames(){
        global $connect;
        $sql = "
        SELECT 
        *
        FROM
        superhero
        GROUP BY name
        Order BY name";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option value='". $record['name']."'>".$record['name'] . "</option>";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Super Hero Movies</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <form>
            <select name="name" id="name">
                <option value =''>Select One</option>
                <?=displayNames()?>
            </select>
        <input type="submit" value="Submit" />
        </form>
        <div id="waiting"></div>
        <h1 id="feedback"></h1>
        <h1 id ='test'></h1>
        <table id="movieTable">
            
        </table>
        <div id="title"></div>
    <button id="historyButton">History</button>
    <br>
          

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "js/search.js"></script>
    <iframe id="searchHistory" src= "history.php" width='300' height='800' frameborder=0>

        
    </iframe>  
    </body>
</html>

