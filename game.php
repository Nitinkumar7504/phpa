<?php
session_start();

if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die("Name parameter missing");
}

if (isset($_POST['logout'])) {
    header("Location: index.php");
    return;
}

$name = htmlentities($_GET['name']);

function check($computer, $human) {
    if ($human == $computer) return "Tie";
    if ($human == 0 && $computer == 2) return "You Win";
    if ($human == 1 && $computer == 0) return "You Win";
    if ($human == 2 && $computer == 1) return "You Win";
    return "You Lose";
}

$names = array("Rock", "Paper", "Scissors");
$result = false;

if (isset($_POST['human'])) {
    $human = $_POST['human'];
    if ($human == -1) {
        $result = "Please select a strategy and press Play.";
    } else {
        $computer = rand(0, 2);
        $result = "Human={$names[$human]} Computer={$names[$computer]} Result=";
        $result .= check($computer, $human);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>d8fc21af - Rock Paper Scissors</title>
</head>
<body style="font-family: sans-serif;">
<h1>Rock Paper Scissors</h1>
<p>Welcome: <?= $name ?></p>

<form method="post">
    <select name="human">
        <option value="-1">Select</option>
        <option value="0">Rock</option>
        <option value="1">Paper</option>
        <option value="2">Scissors</option>
    </select>
    <input type="submit" value="Play">
    <input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if ($result !== false) {
    echo $result . "\n";
}

for ($c = 0; $c < 3; $c++) {
    for ($h = 0; $h < 3; $h++) {
        $r = check($c, $h);
        echo "Human={$names[$h]} Computer={$names[$c]} Result=$r\n";
    }
}
?>
</pre>
</body>
</html>
