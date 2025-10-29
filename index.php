<?php
// Start session BEFORE any HTML output
session_start();

if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die("Name parameter missing");
}

if (isset($_POST['logout'])) {
    header("Location: index.php");
    return;
}

$name = htmlentities($_GET['name']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>d8fc21af - Rock Paper Scissors</title>
</head>
<body>
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
function check($computer, $human) {
    if ($human == $computer) return "Tie";
    if ($human == 0 && $computer == 2) return "You Win";
    if ($human == 1 && $computer == 0) return "You Win";
    if ($human == 2 && $computer == 1) return "You Win";
    return "You Lose";
}

if (isset($_POST['human'])) {
    $human = $_POST['human'];
    if ($human == -1) {
        echo "Please select a strategy and press Play.\n";
    } else {
        $computer = rand(0, 2);
        $names = array("Rock", "Paper", "Scissors");
        $result = check($computer, $human);
        echo "Human={$names[$human]} Computer={$names[$computer]} Result=$result\n";
    }
}

echo "\n";
$names = array("Rock", "Paper", "Scissors");
for($c=0; $c<3; $c++) {
    for($h=0; $h<3; $h++) {
        $r = check($c, $h);
        echo "Human={$names[$h]} Computer={$names[$c]} Result=$r\n";
    }
}
?>
</pre>
</body>
</html>
