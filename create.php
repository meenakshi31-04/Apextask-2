<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require __DIR__ . '/config.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);
    header("Location: index.php");
    exit;
}
?>
<html>  
    <head>  
        <title>Create Post</title>
        <link rel="stylesheet" href="style.css">
         <meta name="test" content="this is a test">
</head>
    </head>
    <body>

    <form method="post">
    Title: <input type="text" name="title" required><br>
    Content: <textarea name="content" required></textarea><br>
    <button type="submit">Create</button>
    </form>
    <center><button type="submit"><a href="index.php">Back to Home</a></button></center>
</body>
</html>

