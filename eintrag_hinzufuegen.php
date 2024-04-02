<?php
	// Stellen Sie sicher, dass die Verbindungsinformationen zur Datenbank korrekt sind
	require_once '../Private/dbconfig.php'; // Pfad zur Datenbankkonfigurationsdatei anpassen

	// Überprüfen, ob das Formular abgesendet wurde
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sicherstellen, dass die benötigten POST-Variablen existieren
    if(isset($_POST['name']) && isset($_POST['nachricht'])) {
        // Erstellen der Datenbankverbindung
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

        // Überprüfen der Verbindung
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        // Eingaben bereinigen
        $name = trim($_POST['name']);
        $nachricht = trim($_POST['nachricht']);

        // SQL-Statement vorbereiten, um SQL-Injection zu verhindern
		$stmt = $conn->prepare("INSERT INTO gaestebuch (name, nachricht, approved) VALUES (?, ?, FALSE)");
		$stmt->bind_param("ss", $name, $nachricht);


        // Versuchen, den Eintrag in die Datenbank einzufügen
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
			$meldung = "Eintrag wurde erfolgreich hinzugefügt. Sobald er genehmigt wurde, wird er hier angezeigt.";
        } else {
            echo "Fehler beim Hinzufügen des Eintrags: " . $stmt->error;
            $stmt->close();
            $conn->close();
        }
		} else {
			echo "Name und Nachricht sind erforderlich.";
		}
	} else {
		// Wenn das Skript nicht durch ein POST-Request aufgerufen wird
		$meldung= "Ungültige Anfrage.";
	}

	// Optional: Weiterleitung zurück zum Gästebuch
	header('Location: index.php?page=gaestebuch&meldung=' . $meldung); // Pfad anpassen, falls nötig
	?>

/* Dieser Code ist Teil eines PHP-Skripts, das in eintrag_hinzufuegen.php verwendet wird, um Gästebucheinträge zu verarbeiten und in eine Datenbank einzufügen. Hier ist, Schritt für Schritt, was der Code macht:


Überprüfen des Request-Typs:
if ($_server["request_method"] == "post") { ... }
Der Code überprüft zuerst, ob die Anfrage an das Skript eine POST-Anfrage ist. POST-Anfragen werden üblicherweise verwendet, um Daten von einem Formular zu senden. Diese Überprüfung hilft dabei, sicherzustellen, dass das Skript nur reagiert, wenn es durch das Absenden eines Formulars aufgerufen wird.

Überprüfen der Existenz von Formulardaten:
if(isset($_POST['name']) && isset($_POST['nachricht'])) { ... }
Dann überprüft der Code, ob die erforderlichen Daten (name und nachricht) vom Formular gesendet wurden. Dies wird getan, um sicherzustellen, dass keine leeren Einträge in die Datenbank eingefügt werden.

Vorbereiten der Datenbankabfrage:
$stmt = $conn->prepare("INSERT INTO gaestebuch (name, nachricht) VALUES (?, ?)");
Der Code bereitet ein SQL-Statement vor, um den Namen und die Nachricht des Benutzers in die Tabelle gaestebuch der Datenbank einzufügen. Dabei werden Platzhalter (?) verwendet, um SQL-Injection zu verhindern.

Binden der Variablen an das vorbereitete Statement:
$stmt->bind_param("ss", $name, $nachricht);
Die vom Benutzer eingegebenen Werte für name und nachricht werden an die Platzhalter im SQL-Statement gebunden. Die "ss" gibt an, dass beide Variablen als Strings behandelt werden.

Ausführen des Statements:
if ($stmt->execute()) { ... }
Das vorbereitete Statement wird ausgeführt. Wenn die Ausführung erfolgreich ist, wird "Eintrag erfolgreich hinzugefügt." ausgegeben. Andernfalls wird eine Fehlermeldung mit Details zum Fehler ausgegeben.

Ressourcen freigeben und Verbindung schließen:
$stmt->close(); $conn->close();
Nach dem Einfügen des Eintrags in die Datenbank werden das Statement und die Datenbankverbindung geschlossen, um Ressourcen freizugeben.

Feedback für fehlende Daten:
Wenn die benötigten Daten (name oder nachricht) im Formular nicht vorhanden sind, gibt der Code "Name und Nachricht sind erforderlich." aus.

Feedback für falsche Anfragemethode:
Wenn die Anfrage nicht vom Typ POST ist, gibt der Code "Ungültige Anfrage." aus. Dies tritt auf, wenn jemand versucht, das Skript direkt über die URL aufzurufen, ohne das Formular zu verwenden.
Zusammengefasst: Dieser Code verarbeitet Formulareingaben von einem Gästebuch, indem er sicherstellt, dass die Anfrage gültig ist und alle erforderlichen Informationen vorhanden sind, bevor er einen neuen Eintrag in die Datenbank einfügt. */