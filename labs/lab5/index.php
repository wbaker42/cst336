<?php

include 'dbConnection.php';

$conn = getDatabaseConnection("ottermart");

function displayCategories(){
    global $conn;
    
    $sql = "SELECT catId, catName from om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records); //Can be used to view results
    
    foreach ($records as $record){
        echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
    }
    
function displaySearchResults(){
    global $conn;
    
    if (isset($_GET['searchForm'])){
        echo "<h3>Products Found: </h3><br>";
        //Query below prevents SQL Injection
        $namedParameters = array();
        
        $sql = "SELECT * FROM om_product Where 1";
        if(!empty($_GET['product'])){
                $sql .= " AND (productName LIKE :productName OR productDescription LIKE :productName)";
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
                //$sql .= " OR productDescription LIKE :productName)";
                

        }
        
        if(!empty($_GET['category'])){
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
        }
        
        if(!empty($_GET['priceFrom'])){
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        if(!empty($_GET['priceTo'])){
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }
        
        if (isset($_GET['orderBy'])){
            if ($_GET['orderBy'] == "price"){
                
                $sql .= " ORDER BY price";
            } else {
                $sql .=" ORDER BY productName";
            }
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo"<div id='searchResults'>";
        foreach($records as $record) {
            echo "<div class='itemResult'>" . "<span class='historyButton'><a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a></span>";
            echo "<span class='productName'>". $record["productName"] . "</span> <span class='productPrice'>$" . $record["price"] . "</span><br> <span class='productDescription'>". $record["productDescription"] . "</span></div><br /><br />";
        }
        echo"</div>";
    }
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <link href="css/styles.css" rel="stylesheet" type='text/css'/>
    </head>
    <body>
        
            <h1> OtterMart Product Search </h1>
            <br>
        <div id='inputForm'>
        <form>
            
            <div class ='inputType'> Product: <input type="text" name="product" class='text' id='product'/></div>
            <br>
            
            <div class ='inputType'>Category:
                <select name='category' id='category'>
                    <option value="">Select One</option>
                    <?=displayCategories()?>
                </select></div>
            <br>
            <div class ='inputType'>Price: From <input type="text" name="priceFrom" size="7" class='text' id='priceLo'/>
                   To   <input type="text" name="priceTo" size="7" class='text' id='priceHi'/></div>
            <br>
            
            <div class ='inputType'>Order result by:
            <br>
            
            <input type="radio" name="orderBy" value="price"/> Price <br>
            <input type="radio" name="orderBy" value="name"/> Name</div>
            
            <br /><br />
            
            <input type="submit" value="Search" name="searchForm" />
        </form>
        
        <br />
        
        </div>
        
        <hr>
        <?= displaySearchResults() ?>
    </body>
</html>