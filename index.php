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
            <div class="main-grid-2x grid-spendenaufruf">
                <span>Liebe Unterstützerinnen und Unterstützer,</span><br>
                <span>die Nevsub Stiftung setzt sich dafür ein, Bedürftigen und Gemeinden auf der ganzen Welt zu helfen. Durch die Finanzierung von wichtigen Projekten können wir einen positiven und nachhaltigen Einfluss auf die Gesellschaft haben.</span><br>
                <span>Leider sind wir auf Spenden angewiesen, um unsere Arbeit fortzusetzen und noch größere Auswirkungen zu erzielen. Jeder Beitrag, egal wie groß oder klein, hilft uns dabei, bedürftigen Menschen zu unterstützen und eine bessere Zukunft für alle zu schaffen.</span><br>
                <span>Wir bitten Sie deshalb um Ihre Spende. Mit Ihrer Unterstützung können wir weiterhin wichtige Projekte finanzieren und eine noch größere Auswirkung auf die Gesellschaft haben.</span><br>
                <span>Vielen Dank im Voraus für Ihre großzügige Spende. Gemeinsam können wir eine bessere Welt schaffen.</span><br>
                <span>Herzliche Grüße,</span>
                <span>Euer Nevsub Stiftung Team</span>
            </div>
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