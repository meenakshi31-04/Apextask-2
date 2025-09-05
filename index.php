<?php
session_start();
require 'config.php';
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM posts ORDER BY created_at DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>  
    <title>Blog Home</title>
    <link rel="stylesheet" href="style.css">
     <meta name="test" content="this is a test">
</head>
</head>                                         
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
   <center><button type="submit"><a href="create.php">Create Post</a></button>  |
    <button> <a href="logout.php">Logout</a></button> </center>
    <h2>Blog Posts</h2>
    <?php foreach ($posts as $post): ?>
        <div style="background-color: aquamarine;text-align: center; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <h3><?php echo htmlspecialchars($post['title']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            <small>Posted on <?php echo $post['created_at']; ?></small><br>
            <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a>| 
           <a href="delete.php?id=<?php echo $post['id']; ?>">Delete</a>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>