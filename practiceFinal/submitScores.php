<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$heroName = $_POST['heroName'];
$correct = $_POST['correct'];
$incorrect = $_POST['incorrect'];



$sql = "INSERT INTO scores (name, correct, incorrect)
        VALUES (:name, :correct, :incorrect)";
$data = array(
    ":name" => $heroName,
    ":correct" => $correct,
    ":incorrect" => $incorrect
);

$stmt = $connect->prepare($sql);
$stmt->execute($data);

//Adding new score to database

//Retrieving total times quiz has been submitted and average score for this user //
$sql = "SELECT count(1) times, sum(correct) correctA, sum(incorrect) incorrectA
        FROM scores
        WHERE name = :name";
$data = array(
    ":name" => $heroName,
    //":correct" => $correct,
    //":incorrect" => $incorrect
);
$stmt = $connect->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
//Encoding data using JSON

?>