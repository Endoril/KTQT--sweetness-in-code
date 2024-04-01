<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTQT - sweetness in code ...</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="start">
        <div class="start-container welcome-section">
            <h1>Willkommen bei KTQT</h1>
            <p>sweetness in code ...</p>
            <p>Entdecke mit mir die Welt der Programmierung!</p>
            <p>Hier findest du meine Projekte.</p>
            <p>Tauche ein in die süße Welt des Codes!</p>
        </div>  
    </div>

<?php 
require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prüft, ob ein Eintrag mit id = 1 existiert, und erstellt einen, falls nicht vorhanden
    $checkStatement = $conn->prepare("SELECT 1 FROM besucher WHERE id = 1");
    $checkStatement->execute();
    if ($checkStatement->rowCount() == 0) {
        $insertStatement = $conn->prepare("INSERT INTO besucher (id, besuche, letzter_besuch) VALUES (1, 0, NOW())");
        $insertStatement->execute();
    }

    // Aktualisiert den Besucherzähler
    $updateStatement = $conn->prepare("UPDATE besucher SET besuche = besuche + 1, letzter_besuch = NOW() WHERE id = 1");
    $updateStatement->execute();

    $besucheranzahl = "Nicht verfügbar"; // Standardwert falls keine Daten abgerufen werden können
    if ($updateStatement->rowCount() > 0) {
        $selectStatement = $conn->prepare("SELECT besuche FROM besucher WHERE id = 1");
        $selectStatement->execute();
        $result = $selectStatement->fetch(PDO::FETCH_ASSOC);
        $besucheranzahl = $result['besuche'];
    }
} catch (PDOException $e) {
    echo "Datenbankverbindung fehlgeschlagen: " . htmlspecialchars($e->getMessage());
    // Hier könnte ein Logging-Mechanismus eingebaut werden
}
?>   
    <div id="besucherzaehler-container">
        <p>Besucherinnenzähler: <span id="besucherzaehler"><?php echo htmlspecialchars($besucheranzahl); ?></span></p>
    </div>
</body>
</html>
