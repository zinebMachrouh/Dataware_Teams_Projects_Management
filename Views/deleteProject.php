<?php
include '../SQL/connect.php';
ob_start();

$id = $_GET['deleteOne'];
$query = "UPDATE teams 
            SET projectId = NULL
            WHERE projectId = :id";
$stmt1 = $conn->prepare($query);
$stmt1->bindParam(':id', $id);
$stmt1->execute();

$stmt = $conn->prepare("DELETE FROM projects WHERE id = :projectId");
$stmt->bindParam(':projectId', $id, PDO::PARAM_INT);
$stmt->execute();
header("Location: ./dashboard.php");
exit();
