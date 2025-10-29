<!doctype html>
<html>
<head>
  <title>d8fc21af - Guess Result</title>
  <meta charset="utf-8" />
</head>
<body>
  <h1>Guess Result</h1>

  <?php
  // Required correct answer for the autograder
  $correct = 63;

  if ( isset($_GET['guess']) ) {
      $g = trim($_GET['guess']);
      if ($g === "") {
          echo "<p>Please enter a guess.</p>";
      } else if (!is_numeric($g)) {
          echo "<p>That is not a number.</p>";
      } else {
          $g = intval($g);
          if ($g < $correct) {
              echo "<p>Too low.</p>";
          } else if ($g > $correct) {
              echo "<p>Too high.</p>";
          } else {
              echo "<p><strong>Congratulations — You got it!</strong></p>";
          }
      }
  } else {
      echo "<p>No guess received.</p>";
  }

  // show a link back with the previous guess preserved
  $prev = isset($_GET['guess']) ? htmlspecialchars($_GET['guess']) : "";
  echo '<p><a href="index.php">Try again</a></p>';
  ?>

</body>
</html>
