<?php
    session_start();
    
    function displayHistory(){
    foreach ($_SESSION['recent'] as $item){
        echo"<h1>$item</h1> <br>";
    }
}
?>
<html>
    <head>
        <title>History</title>
    </head>
    <body>
    <?=displayHistory()?>
    <p>TEST</p>      
    </body>
      
</html>