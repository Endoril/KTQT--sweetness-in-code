<?php

// Verbindung zur Datenbank herstellen
require_once '../Private/dbconfig.php'; // Pfad

// Formular für neue Einträge
echo '<form action="eintrag_hinzufuegen.php" method="post">
        Name: <input type="text" name="name" required><br>
        Nachricht: <textarea name="nachricht" required></textarea><br>
        <input type="submit" value="Eintrag hinterlassen">
      </form>';

// Einträge aus der Datenbank holen und anzeigen
$result = $conn->query("SELECT name, nachricht, erstellt_am FROM gaestebuch ORDER BY erstellt_am DESC");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row["name"]). "</strong>: " . htmlspecialchars($row["nachricht"]). " <br> <em>" . $row["erstellt_am"]. "</em></p>";
    }
} else {
    echo "Keine Einträge vorhanden.";
}

?>
