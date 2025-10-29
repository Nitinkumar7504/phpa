<!DOCTYPE html>
<html>
<head>
  <title>d8fc21af - Guessing Game</title>
</head>
<body>
  <h1>Welcome to the Guessing Game</h1>
  <p>Hint: The correct number is 63</p>

  <form method="get">
    <label for="guess">Enter your guess:</label>
    <input type="text" name="guess" id="guess">
    <input type="submit" value="Submit">
  </form>

  <p>
  <?php
  if (!isset($_GET['guess'])) {
      echo "Missing guess parameter";
  } else if (strlen($_GET['guess']) < 1) {
      echo "Your guess is too short";
  } else if (!is_numeric($_GET['guess'])) {
      echo "Your guess is not a number";
  } else if ($_GET['guess'] < 63) {
      echo "Your guess is too low";
  } else if ($_GET['guess'] > 63) {
      echo "Your guess is too high";
  } else {
      echo "Congratulations - You are right";
  }
  ?>
  </p>
</body>
</html>
