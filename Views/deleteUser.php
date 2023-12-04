<?php
include '../SQL/connect.php';
ob_start();
session_start();
$id = $_GET['deleteOne'];
$stmt = $conn->prepare("DELETE FROM users WHERE id = :userId");
$stmt->bindParam(':userId', $id, PDO::PARAM_INT);
$stmt->execute();
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
exit();
?>