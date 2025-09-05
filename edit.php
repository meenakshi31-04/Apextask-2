<?php
session_start();
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->execute([$title, $content, $id]);
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
    Title: <input type="text" name="title" value="<?php echo $post['title']; ?>" required><br>
    Content: <textarea name="content" required><?php echo $post['content']; ?></textarea><br>
    <button type="submit">Update</button>
</form>
</body>
</html>
