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

                $sql = "SELECT * FROM projekte";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
                        echo(
                            '<form class="main-grid-1x grid-projekt" action="./spenden.php" method="post">
                                <h2>' . $row["projektname"] . '</h2>
                                <span>' . $row["projektart"] . '</span>
                                <span>' . $row["projektbeschreibung"] . '</span>
                                <span>' . $row["fertigstellung"] . '</span>
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