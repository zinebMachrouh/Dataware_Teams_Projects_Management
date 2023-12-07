<?php
include '../SQL/connect.php';
ob_start();

$id = $_GET['deleteOne'];

$query = "DELETE FROM teams WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $teamId);

return $stmt->execute();
?>