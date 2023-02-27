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
  <div class="main">
    <div class="main-weiterleitung">
      <?php
        $payment_method = $_POST['payment_method'];
        switch ($payment_method) {
          case 'paypal':
            $betrag = $_POST['spendenbetrag'];
            echo (
              '<div class="main-spendentext">
                <img src="./bilder/paypal.png" alt="PayPal" class="payment-img">
                <span>Vielen Dank ' . $_SESSION['vorname'] . ' ' . $_SESSION['name'] . ' für Ihre Spende in Höhe von</span>
                <h1>' . $betrag . '</h1>
                <span>Eine Quittung für Ihre Spende wird innerhalb von 2 Werktagen an ' . $_SESSION['email'] . ' versand.</span>
              </div>'
            );
            break;
                    
          case 'kartenzahlung':
            $betrag = $_POST['spendenbetrag'];
            echo (
              '<div class="main-spendentext">
                <img src="./bilder/card.png" alt="Karte" class="payment-img">
                <span>Vielen Dank ' . $_SESSION['vorname'] . ' ' . $_SESSION['name'] . ' für Ihre Spende in Höhe von</span>
                <h1>' . $betrag . '</h1>
                <span>Eine Quittung für Ihre Spende wird innerhalb von 2 Werktagen an ' . $_SESSION['email'] . ' versand.</span>
              </div>'
            );
            break;
                    
          case 'ueberweisung':
            $betrag = $_POST['spendenbetrag'];
            $kontoinhaber = $_POST['inahber-ueberweisung'];
            $iban = $_POST['iban-ueberweisung'];

            echo (
              '<div class="main-spendentext">
                <img src="./bilder/ueberweisung.png" alt="Karte" class="payment-img">
                <span>Vielen Dank ' . $_SESSION['vorname'] . ' ' . $_SESSION['name'] . ' für Ihre Spende in Höhe von</span>
                <h1>' . $betrag . '</h1>
                <span>Eine Quittung für Ihre Spende erhalten Sie an ' . $_SESSION['email'] . ' , nachdem bei uns der oben angegebene Betrag von dem Konto</span>
                <h3>' . $kontoinhaber . '</h3>
                <h3>'. $iban. '</h3>
                <span>bei uns eingegangen ist.</span>
              </div>'
            );
            break;

          case 'sachspende':
            $sachspende = $_POST['auswahl_sachspende'];

            echo (
              '<div class="main-spendentext">
                <img src="./bilder/ueberweisung.png" alt="Karte" class="payment-img">
                <span>Vielen Dank ' . $_SESSION['vorname'] . ' ' . $_SESSION['name'] . ' für Ihre Spende von</span>
                <h1>' . $sachspende . '</h1>
                <span>Ein Mitarbeiter wird sich bei Ihnen per E-Mail melden um Ihre Spende zu überprüfen.</span>
                <span>Eine Quittung für Ihre Spende erhalten Sie an ' . $_SESSION['email'] . ' , nachdem bei uns die oben angegebene Sachspende bei uns eingegangen ist.</span>
              </div>'
            );
            break;
        }
      ?>
      <a href="./index.php">zurück zur Startseite</a>
    </div>
  </div>
</body>
</html>