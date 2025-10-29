<?php
session_start();
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die("Name parameter missing");
}

if (isset($_POST['logout'])) {
    header("Location: index.php");
    return;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>d8fc21af - Game Page</title>
</head>
<body>
<h1>Welcome to the Game</h1>
<p>Welcome: <?= htmlentities($_GET['name']) ?></p>
<form method="post">
<input type="submit" name="logout" value="Logout">
</form>
</body>
</html>
