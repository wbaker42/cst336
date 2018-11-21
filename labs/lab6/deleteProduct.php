<?php
    session_start();
    include 'dbConnection.php';
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
    
    $conn = getDatabaseConnection("ottermart");
    
    $sql="DELETE FROM om_product WHERE productId = " . $_GET['productId'];
    $statement = $conn ->prepare($sql);
    $statement->execute();
    
    header("Location: admin.php");
?>