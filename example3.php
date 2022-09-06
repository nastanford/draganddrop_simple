<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Example 3</title>
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <?php
    $dsn = "mysql:host=".$DB_HOST.";dbname=".$DB_DATABASE;
    $pdo = new PDO($dsn, $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM items order by orderby";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    $resultsCount=count($results);
    echo "\n<div class=container>\n";
      for($i=0;$i<$resultsCount;$i++)
      {
        echo "\t<div id=".$results[$i]['id']." draggable=true class=box>";
        echo $results[$i]['item'];
        echo "</div>\n";
      }
    echo "</div>";
    ?>
  <script src="js/app3.js"></script>
</body>
</html>