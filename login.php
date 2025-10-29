<?php
session_start();

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; // hash of 'XyZzy12*_php123'
$failure = false;

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    return;
}

if (isset($_POST['who']) && isset($_POST['pass'])) {
    if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ($check == $stored_hash) {
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>d8fc21af - Login Page</title>
</head>
<body>
<h1>Please Log In</h1>
<?php
if ($failure !== false) {
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="password" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>Hint: The password is the programming language used in this course followed by 123.</p>
</body>
</html>
