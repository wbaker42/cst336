<?php

    $backgroundImage = "img/sea.jpg";
    
    if(isset($_GET['category'])){
        $category = $_GET['category'];
        if($category != ''){
            $keyword = $category;
        }
        
    }if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        if($category != ''){
            $keyword = $category;
        }
        if($keyword == ""){
            echo "<h2>You did not enter a keyword.</h2>";
        }
    }
    if($keyword != ""){
        include 'api/pixabayAPI.php';
        $layout = $_GET['layout'];
        $imageURLs = getImageURLs($keyword, $layout);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>

        <link href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/styles.css");
            body{
                background-image:url(<?=$backgroundImage?>);
                background-size: 100% 100%;
                background-attachment: fixed;
                }
        </style>
    </head>
    <body>
        <br/> <br />
        <?php
            if (!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow with random images from Pixalbay.com </h2>";
            } else{

        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            
            <ol class="carousel-indicators">
                <?php
                    for($i=0; $i<7;$i++){
                        echo"<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)? "class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i=0; $i<7; $i++){
                        do{
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while(!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0) ? "active" : "";
                        echo '">';
                        echo '<img src ="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            }//end of the else statement            
        ?>
        <br>
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit" />
            <br><br>
            <div id="test"><input type = "radio" id = "lhorizontal" name = "layout" value = "horizontal">
            <label for = "Horizontal"></label><label for "lhorizontal"> Test </label>
            
            <input type = "radio" id = "lvertical" name = "layout" value = "vertical">
            <label id="lab" for = "Vertical"></label><label for "lhorizontal"> Vertical </label>
            <select name="category" >
                 <option value="">- Select -</option>
                 <option > Frog </option>
                 <option > Dog </option>
                 <option > Hare </option>
                 <option > Bear </option>
            </select>
            </div>
            <br /><br />
        </form>
        <br/> <br />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>