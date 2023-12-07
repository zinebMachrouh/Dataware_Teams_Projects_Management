<?php
include '../SQL/connect.php';
ob_start();


$user_id = $_GET['user_id'];
$team_id = $_GET['team_id'];

$query = "DELETE FROM team_user WHERE user_id = :user_id AND team_id = :team_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':team_id', $team_id, PDO::PARAM_INT);
$stmt->execute();

header('Location:./dashboard.php');
?>