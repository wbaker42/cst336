<?php
    session_start();
    include 'dbConnection.php';
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
    
    $conn = getDatabaseConnection("ottermart");
    
    function getCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record){
            echo "<option value='" . $record["catId"] . "'>" . $record['catName'] . " </option>";
        }
    }
    
    if (isset($_GET['submitProduct'])){
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
        
        $sql ="INSERT INTO om_product
               (productName, productDescription, productImage, price, catId)
               VALUE ( :productName, :productDescription, :productImage, :price, :catId)";
               
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
        echo "<p class = 'lead' id = 'error' style = 'color:red'>";
        echo "<strong>New product has been uploaded!</strong></p>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add Product </title>
        <link href="css/styles.css" rel="stylesheet" type='text/css'/>
    </head>
    <body>
        
            <h1> Add Product </h1>
    
    <form>
        <strong>Product name</strong> <input type='text' class='form-control' name='productName'><br>
        <strong>Description</strong> <textarea class='form-control' name='description' cols = 50 rows = 4></textarea><br>
        <strong>Price</strong> <input type='text' class='form-control' name='price'><br>
        <strong>Category</strong> <select class='form-control' name='catId'><br>
            <option value="">Select One</option>
            <?php getCategories(); ?>
        </select><br>
        <strong>Set Image</strong> <input type='text' class='form-control' name='productImage'><br>
        <input type='submit' name='submitProduct' class='btn btn-primary' value='Add Product'>
    </form>
    </body>
</html>