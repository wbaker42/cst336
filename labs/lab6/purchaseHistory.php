<html>
    <head>
        <title> Order History </title>
        <link href="css/styles.css" rel="stylesheet" type='text/css'/>
    </head>
    <body>
    
<?php 
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    $productId = $_GET['productId'];
    
    $sql = "SELECT *
            FROM om_product
            NATURAL JOIN om_purchase
            WHERE productId = :pId";
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($records[0]['productName'] != ''){
        echo "<div id='searchResults'";
        echo $records[0]['productName'] . "<br/>";
        echo "<img id='productImage' src='" . $records[0]['productImage'] . "' width='200'/><br/><div id='historyResult'>";
        
        foreach ($records as $record){
            
            echo " Purchase Date: " . $record["purchaseDate"] . "<br/>";
            echo "Unit Price: " . $record["unitPrice"] . "<br/>";
            echo "Quantity: " . $record["quantity"] . "<br/>";
        }
        echo"</div><br></div>";
    }
    else{
        echo "<h1> No Purchase History</h1>";
    }

?>


    </body>
</html>