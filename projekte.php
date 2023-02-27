<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projekte</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="./bilder/favicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
  <?php include 'session_start.php';?>
  <?php include 'header.php'; ?>
  <div class="main">
    <div class="projekte-error hide" id="projekte_error">
      <span>Um Spenden zu können müssen Sie angemeldet sein!</span>
    </div>
    <div class="main-grid">
      <?php
        $server = "localhost";
        $username = "nevsub";
        $password = "i6SG7-i6SG7";
        $database = "nevsub";

        // Verbindung zur Datenbank
        $conn = mysqli_connect($server, $username, $password, $database);

        // Verbindung überprüfen
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM projekte";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          // Daten aus jeder Reihe ausgeben
          while($row = mysqli_fetch_assoc($result)) {
            echo(
              '<form class="main-grid-1x grid-projekt" action="./spenden.php" method="post">
                <h2>' . $row["projektname"] . '</h2>
                <span class="projekt-titles">Projektart:</span>
                <span class="projekt-data prart">' . $row["projektart"] . '</span>
                <span class="projekt-titles">Projektbeschreibung:</span>
                <span class="projekt-data prbeschreibung">' . $row["projektbeschreibung"] . '</span>
                <span class="projekt-titles">Fertigstellung:</span>
                <span class="projekt-data prdatum">' . $row["fertigstellung"] . '</span>
                <input type="hidden" name="projektid" value="'. $row["id"] .'" />
                <input type="submit" value="Spenden" class="form-spenden-btn"/>
              </form>'
            );
          }
        }

        mysqli_close($conn);
      ?>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>