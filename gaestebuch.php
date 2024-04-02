<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gästebuch</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navigation.css">
</head>
<body>

<?php include 'navi.php'; ?>
	
	<div class="gaestebuch">
	
<?php
        require_once '../Private/dbconfig.php';
		
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		
        if ($conn->connect_error) 
        {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
		
        echo '<p style="color:red">' . htmlspecialchars($_GET["meldung"]) . '</p>';

        echo '<form action="eintrag_hinzufuegen.php" method="post">
                Name: <input type="text" name="name" required><br>
                Nachricht: <textarea name="nachricht" required></textarea><br>
                <input type="submit" value="Eintrag hinterlassen">
              </form>';

        /* Einträge aus der Datenbank holen und anzeigen
		$result->fetch_assoc(): Diese Methode wird auf ein Objekt angewandt, das durch Ausführen einer SQL-Abfrage auf einer Datenbankverbindung erhalten wurde (typischerweise ein mysqli_result-Objekt, wenn //die mysqli-Erweiterung verwendet wird). Die Methode fetch_assoc() holt eine Zeile aus dem Ergebnisset und gibt sie als assoziatives Array zurück, bei dem die Schlüssel die Spaltennamen der Tabelle //sind. Für jede Spalte in der Zeile gibt es ein Schlüssel-Wert-Paar im Array.
		while($row = $result->fetch_assoc()): Diese Schleife wird für jede Zeile im Ergebnisset der Abfrage ausgeführt. Bei jedem Durchlauf holt fetch_assoc() die nächste Zeile aus dem Ergebnisset und weist //sie der Variable $row als ein assoziatives Array zu. Die Schleife wird solange ausgeführt, bis alle Zeilen durchlaufen wurden oder fetch_assoc() null zurückgibt, was signalisiert, dass es keine //weiteren Zeilen mehr gibt.*/
		
		$result = $conn->query("SELECT name, nachricht, erstellt_am FROM gaestebuch WHERE approved = 1 ORDER BY erstellt_am DESC;");
		
		if ($result->num_rows > 0) 
		{    
			while($row = $result->fetch_assoc()) 
			{
				$formattedDate = date('d.m.y H:i', strtotime($row["erstellt_am"]));
				
				echo "<p><strong>" . htmlspecialchars($row["name"]). "</strong>: " . htmlspecialchars($row["nachricht"]). " <br> <em>" . $formattedDate . "</em></p>";
			}
		} 
		else 
		{
			echo "Keine Einträge vorhanden.";
		}
		
		$conn->close();
 ?>
	
	</div>
</body>
</html>


