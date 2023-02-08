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
        <div class="main-spenden">
            <?php
                $server = "localhost";
                $username = "nevsub";
                $password = "i6SG7";
                $database = "nevsub";

                // Connect to the database
                $conn = mysqli_connect($server, $username, $password, $database);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $projektid = $_POST['projektid'];

                $sql = "SELECT * FROM projekte WHERE id = '$projektid'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo(
                            '<h1>' . $row["projektname"] . '</h1>
                            <span class="projekt-titles">Projektart:</span>
                            <span class="projekt-data">' . $row["projektart"] . '</span>
                            <span class="projekt-titles">Projektbeschreibung:</span>
                            <span class="projekt-data">' . $row["projektbeschreibung"] . '</span>
                            <span class="projekt-titles">Fertigstellung:</span>
                            <span class="projekt-data">' . $row["fertigstellung"] . '</span>'
                        );
                    }
                }

                mysqli_close($conn);
            ?>
            <div class="div-spenden">
                <form class="form-spenden" action="./weiterleitung.php" method="post" id="spenden_form">
                    <div class="payment-methods">
                        <ul class="payment-methods-ul">
                            <li class="payment-methods-li">
                                <img src="./bilder/paypal.png" alt="PayPal" class="payment-img">
                                <input type="radio" name="payment_method" value="paypal" class="payment-radio" checked id="paypal_radio">
                                <span>PayPal</span>
                            </li>
                            <li class="payment-methods-li">
                                <img src="./bilder/card.png" alt="Karte" class="payment-img">
                                <input type="radio" name="payment_method" value="kartenzahlung" class="payment-radio" id="kartenzahlung_radio">
                                <span>Kartenzahlung</span>
                            </li>
                            <li class="payment-methods-li">
                                <img src="./bilder/ueberweisung.png" alt="Überweisung" class="payment-img">
                                <input type="radio" name="payment_method" value="ueberweisung" class="payment-radio" id="ueberweisung_radio">
                                <span>Überweisung</span>
                            </li>
                            <li class="payment-methods-li">
                                <img src="./bilder/sachspende.png" alt="Sachspende" class="payment-img">
                                <input type="radio" name="payment_method" value="sachspende" class="payment-radio" id="sachspende_radio">
                                <span>Sachspende</span>
                            </li>
                        </ul>
                    </div>
                    <!-- -------------------------------------------------------------------------------------------------- -->
                    <div class="spenden-betrag-auswahl" id="spenden_betrag_input">
                        <input type="text" name="betrag-ueberweisung" placeholder="Spendenbetrag" id="spenden_betrag" class="form-input">
                        <span class="info-msg">Cent-Beträge sind leider nicht möglich!!!</span>
                        <span class="form-error" id="betrag_error"></span>
                    </div>
                    <div class="spenden-betrag-auswahl hide" id="sachspende_auswahl_input">
                        <input list="sachspende" type="text" name="auswahl_sachspende" placeholder="Bitte auswählen" id="sachspende_auswahl" class="form-input">
                        <datalist id="sachspende">
                            <option value="Klamotten">
                            <option value="Lebensmittel">
                            <option value="Wasserkanister">
                            <option value="Verbände">
                        </datalist>
                        <span class="form-error" id="sachspende_error"></span>
                    </div>
                    <!-- -------------------------------------------------------------------------------------------------- -->
                    <div class="payment-info" id="paypal_info">
                        <h2>PayPal - Daten</h2>
                        <span>Vorname: <?php echo $_SESSION['vorname'] ?></span>
                        <span>Nachname: <?php echo $_SESSION['name'] ?></span>
                        <span>Email: <?php echo $_SESSION['email']?></span>
                        <div class="payment-method-info">
                            <span>Bitte klicken Sie auf den unteren Button um zu PayPal weitergeleitet zu werden.</span>
                        </div>
                    </div>
                    <div class="payment-info hide" id="kartenzahlung_info">
                        <h2>Kartenzahlung - Daten</h2>
                        <span>Vorname: <?php echo $_SESSION['vorname'] ?></span>
                        <span>Nachname: <?php echo $_SESSION['name'] ?></span>
                        <span>Email: <?php echo $_SESSION['email']?></span>
                        <div class="payment-method-info">
                            <span>Bitte klicken Sie auf den unteren Button um zur Zahlung weitergeleitet zu werden.</span>
                        </div>
                    </div>
                    <div class="payment-info hide" id="ueberweisung_info">
                        <h2>Überweisung - Daten</h2>
                        <span>Vorname: <?php echo $_SESSION['vorname'] ?></span>
                        <span>Nachname: <?php echo $_SESSION['name'] ?></span>
                        <span>Email: <?php echo $_SESSION['email']?></span>
                        <input type="text" name="inahber-ueberweisung" placeholder="Kontoinhaber" class="form-input nomargin-l" id="spenden_inhaber">
                        <input type="text" name="iban-ueberweisung" placeholder="IBAN" class="form-input nomargin-l" id="spenden_iban">
                        <span class="form-error" id="ueberweisung_error"></span>
                        <div class="payment-method-info">
                            <h2>Überweisungsinformationen</h2>
                            <span>Kontoinhaber: NEVSUB Stiftung</span>
                            <span>Kreditinstitut: Dortmunder Volksbank</span>
                            <span>IBAN: DE44 4416 0014 4040 1909 00</span>
                            <span>BIC: GENODEM1DOR</span>
                            <span>Verwendungszweck: [Vor- und Nachname]</span>
                        </div>
                    </div>
                    <div class="payment-info hide" id="sachspende_info">
                        <h2>Sachspende - Daten</h2>
                        <span>Vorname: <?php echo $_SESSION['vorname'] ?></span>
                        <span>Nachname: <?php echo $_SESSION['name'] ?></span>
                        <span>Email: <?php echo $_SESSION['email']?></span>
                        <div class="payment-method-info">
                            <h2>Sachspendeninformationen</h2>
                            <span>Einer Unser Mitarbeiter wird per E-Mail mit Ihnen Kontakt aufnehmen und Ihre Spende Überprüfen.</span>
                            <span>Sie bekommen nach Überprüfung Ihrer Spende einen Lieferschein an Ihre E-Mail-Adresse gesendet.</span>
                        </div>
                    </div>
                    <!-- -------------------------------------------------------------------------------------------------- -->
                    <div class="payment-submit">
                        <input type="submit" value="Spenden" class="form-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>