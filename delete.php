<?php
session_start();
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM posts WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>
