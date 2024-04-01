<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ihre Webseite</title>
    <!-- Weitere Metadaten und Ressourcen wie CSS-Links -->
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

 <?php
    // Das ist die zentrale Routing-Logik
    // Basierend auf der 'page'-Variable die entsprechende Seite einbinden
    $page = isset($_GET['page']) ? $_GET['page'] : 'start';
    switch ($page) {
        case 'start':
            include 'start.php'; // Startseite einbinden
            break;
        case 'ithumor':
            include 'ithumor.php'; // IT-Humor Seite einbinden
            break;
        case 'projects':
            include 'projects.php'; // Projektseite einbinden
            break;
        case 'timer':
            include 'timer.php'; // Countdown-Seite einbinden
            break;
        case 'legal':
            include 'legal.php'; // Impressum-Seite einbinden
            break;
        case 'gaestebuch':
            include 'gaestebuch.php'; // Gästebuch-Seite einbinden
            break;
        default:
            include 'start.php'; // Default-Seite, wenn keine spezifische Seite angefragt wurde
            break;
    }
?>
	
</body>
</html>


<!-- Die Seite verwendet eine Navigation, die es dem Benutzer ermöglicht, zwischen verschiedenen Seiten zu wechseln.

Die Logik der Seite basiert auf einer page-Variable, die aus der URL abgerufen wird. Basierend auf dem Wert dieser Variablen wird die entsprechende Seite eingebunden, indem include für die spezifizierte PHP-Datei verwendet wird.

Falls keine spezifische Seite angefragt wurde, wird standardmäßig start.php eingebunden. -->
 
 