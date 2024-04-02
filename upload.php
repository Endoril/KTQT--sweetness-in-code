<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="top-nav">
        <a href="index.php?page=start">Start</a> |
        <a href="index.php?page=ithumor">Informatikerinnenhumor</a> |
        <a href="index.php?page=projects">Projekte</a> |
        <a href="index.php?page=timer">Countdown</a> |
        <a href="index.php?page=legal">Impressum</a> |
        <a href="index.php?page=gaestebuch">Gästebuch</a>       
    </div>

    <div class="upload">  
        <div class="upload-form">
            <form action="" method="post" enctype="multipart/form-data">
                Wähle ein Bild zum Hochladen aus:
                <input type="file" name="bild" id="bild">
                <input type="submit" value="Hochladen" name="submit">
            </form>
        </div>
    
    <?php
		define('ADMIN_USERNAME', 'KTadmin');
		define('ADMIN_PASSWORD', 'KäsekuchenmitSahneEins11$');

		if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
			$_SERVER['PHP_AUTH_USER'] != ADMIN_USERNAME || $_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD) 
		{
			header('WWW-Authenticate: Basic realm="Upload Bereich"');
			header('HTTP/1.0 401 Unauthorized');
			echo 'Authentifizierung erforderlich.';
			exit;
		}
	
        require_once '../Private/dbconfig.php'; // Pfad zur Datenbankkonfigurationsdatei anpassen

        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME); // Erstellen der Datenbankverbindung

        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error); // Überprüfen der Verbindung
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["bild"])) {
            $zielverzeichnis = "uploads/";
            $zielDatei = $zielverzeichnis . basename($_FILES["bild"]["name"]);
            $dateiname = $_FILES["bild"]["name"];

            if (move_uploaded_file($_FILES["bild"]["tmp_name"], $zielDatei)) {
                $stmt = $conn->prepare("INSERT INTO bildergalerie (Dateiname, Dateipfad, Hochladedatum) VALUES (?, ?, NOW())");
                $stmt->bind_param("ss", $dateiname, $zielDatei);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "Das Bild $dateiname wurde hochgeladen und in der Datenbank gespeichert.";
                } else {
                    echo "Das Bild wurde hochgeladen, aber es konnte nicht in der Datenbank gespeichert werden.";
                }
                $stmt->close();
                
                header('Location: ' . $_SERVER['PHP_SELF']); // Umleitung um Doppel-Postings zu verhindern
                exit;
            } else {
                echo "Es gab einen Fehler beim Hochladen des Bildes.";
            }
        }

        echo '<div class="upload-list">';
        echo '<h2>Hochgeladene Bilder</h2>';
        $result = $conn->query("SELECT Dateiname, Hochladedatum FROM bildergalerie ORDER BY Hochladedatum DESC");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div><p>Dateiname: '.htmlspecialchars($row["Dateiname"]).'</p>';
                echo '<p>Hochgeladen am: '.htmlspecialchars($row["Hochladedatum"]).'</p></div>';
            }
        }
        echo '</div>';
    ?>
    </div>
</body>
</html>
