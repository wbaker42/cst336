<?php
    session_start();
    include 'dbConnection.php';
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
    
    $conn = getDatabaseConnection("ottermart");
    
    function getCategories($catId){
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record){
            echo "<option ";
            echo ($record["catId"] == $catId)? "selected": "";
            echo " value='" . $record["catId"] . "'>" . $record['catName'] . " </option>";
        }
    }
    
    function getProductInfo(){
        global $conn;
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    
    if (isset($_GET['updateProduct'])){

        
        $sql ="UPDATE om_product
               SET productName = :productName,
               productDescription = :productDescription,
               productImage = :productImage, 
               price = :price,
               catId = :catId
               WHERE productId = :productId";

        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
        $productId = $_GET['productId'];
        
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        $namedParameters[':productId'] = $productId;
        
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
        echo "<p class = 'lead' id = 'error' style = 'color:red'>";
        echo "<strong>Product has been updated!</strong></p>";
    }
    if (isset($_GET['productId'])){
        $product = getProductInfo();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Update Product </title>
        <link href="css/styles.css" rel="stylesheet" type='text/css'/>
    </head>
    <body>
        
            <h1> Update Product </h1>
    
    <form>
        <input type="hidden" name="productId" value ="<?=$product['productId']?>"/>
        
        <strong>Product name</strong> <input type='text' class='form-control' value ="<?=$product['productName']?>" name='productName'><br>
        <strong>Description</strong> <textarea class='form-control' name='description' cols = 50 rows = 4><?=$product['productDescription']?></textarea><br>
        <strong>Price</strong> <input type='text' class='form-control' name='price' value ="<?=$product['price']?>"><br>
        <strong>Category</strong> <select class='form-control' name='catId'><br>
            <option value="">Select One</option>
            <?php getCategories($product['catId']); ?>
        </select><br>
        <strong>Set Image</strong> <input type='text' class='form-control' name='productImage'><br>
        <input type='submit' name='updateProduct' class='btn btn-primary' value='Update Product'>
    </form>
    </body>
</html>