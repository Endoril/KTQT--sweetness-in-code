<?php
	
	require_once 'dbconfig.php';

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$updateStatement = $conn->prepare("UPDATE besucher SET besuche = besuche + 1, letzter_besuch = NOW() WHERE id = 1");
		$updateStatement->execute();

		if ($updateStatement->rowCount() > 0) {
			$selectStatement = $conn->prepare("SELECT besuche FROM besucher WHERE id = 1");
			$selectStatement->execute();
			$result = $selectStatement->fetch(PDO::FETCH_ASSOC);
			$besucheranzahl = $result['besuche'];
		} else {
			$besucheranzahl = "Nicht verfügbar"; // Falls keine Zeile aktualisiert wurde
		}
	} catch (PDOException $e) {
		die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
	}

	

?>

<!-- Es wird eine Verbindung zur Datenbank hergestellt, indem die Konfigurationsdatei dbconfig.php eingebunden wird.

Mit einem UPDATE-SQL-Statement wird die Anzahl der Besuche um eins erhöht, und der Zeitpunkt des letzten Besuchs wird aktualisiert.

Wenn das UPDATE-Statement erfolgreich ist, wird ein SELECT-Statement ausgeführt, um die aktuelle Anzahl der Besuche abzurufen.

Die Anzahl der Besuche wird in der Variable $besucheranzahl gespeichert. Falls keine Zeile aktualisiert wurde, wird $besucheranzahl auf "Nicht verfügbar" gesetzt.

Bei einem Fehler in der Datenbankverbindung wird das Skript mit einer Fehlermeldung beendet. -->