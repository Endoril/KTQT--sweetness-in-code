<div class="gaestebuch">

<?php
    require_once '../Private/dbconfig.php';
    
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    
    echo '<p style="color:red">' . htmlspecialchars($_GET["meldung"] ?? '') . '</p>';

    echo '<form action="eintrag_hinzufuegen.php" method="post">
            Name: <input type="text" name="name" required><br>
            Nachricht: <textarea name="nachricht" required></textarea><br>
            <input type="submit" value="Eintrag hinterlassen">
          </form>';

    $result = $conn->query("SELECT name, nachricht, erstellt_am FROM gaestebuch WHERE approved = 1 ORDER BY erstellt_am DESC;");
    
    if ($result->num_rows > 0) {    
        while($row = $result->fetch_assoc()) {
            $formattedDate = date('d.m.y H:i', strtotime($row["erstellt_am"]));
            
            echo "<p><strong>" . htmlspecialchars($row["name"]). "</strong>: " . htmlspecialchars($row["nachricht"]). " <br> <em>" . $formattedDate . "</em></p>";
        }
    } else {
        echo "Keine Einträge vorhanden.";
    }
    
    $conn->close();
?>

</div>
