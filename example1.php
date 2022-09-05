
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript - Drag and Drop Demo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="container">
        <h1>JavaScript - Drag and Drop</h1>
        <div class="drop-targets">
            <div class="box">
                <div class="item" id="item" draggable="true">
                </div>
            </div>
            <div class="box"></div>
            <div class="box"></div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>

</html>