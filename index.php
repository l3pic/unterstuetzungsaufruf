<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="./bilder/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'session_start.php';?>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="main-grid">
            <div class="main-grid-2x grid-ueberuns">
                <h1 onclick="window.location.href='./ueber-uns.php'">Über uns</h1>
            </div>
            <div class="main-grid-1x grid-projekte">
                <h1 onclick="window.location.href='./projekte.php'">Projekte</h1>
            </div>
        </div>    
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>