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
    $DB_CONNECTION = 'sqlsrv';
    $DB_HOST = '127.0.0.1';
    $DB_PORT = '1433';
    $DB_DATABASE = 'draganddrop';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';    

    $dsn = "mysql:host=".$DB_HOST.";dbname=".$DB_DATABASE;
    $pdo = new PDO($dsn, $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM items order by orderby";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    $resultsCount=count($results);
    for($i=0;$i<$resultsCount;$i++)
    {
      echo "<div class=container>";
      echo "<div id=".$results[$i]['orderby']."draggable=true class=box>";
      echo $results[$i]['orderby']."&nbsp;&nbsp;&nbsp;&nbsp;";  
      echo $results[$i]['item'];
      echo "</div>";
    }
  ?>

</body>
</html>