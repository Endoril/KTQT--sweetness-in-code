<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown</title>
    <link rel="stylesheet" href="css/style.css">	
</head>
<body>
	<div class="timer">
	
<?php	
    header("Refresh:60");
    date_default_timezone_set('UTC-1');
    $jetzt = time();
    $zielDatum = strtotime('2025-05-07');
    $verbleibendeSekunden = $zielDatum - $jetzt;
    
    $verbleibendeTage = floor($verbleibendeSekunden / (60 * 60 * 24));
    $verbleibendeStunden = floor(($verbleibendeSekunden % (60 * 60 * 24)) / (60 * 60));
    $verbleibendeMinuten = floor(($verbleibendeSekunden % (60 * 60)) / 60);

	echo '<div class="timer">';
    echo '<h1>Countdown bis zur Prüfung</h1>'; 
    echo '<p>Hier siehst du den Countdown bis zu meiner IHK-Prüfung</p>';
    echo '<div class="date-time">Datum und Uhrzeit: ' . date('d.m.Y H:i:s') . '</div>';
    echo '<div class="countdown">' . 
         'Noch ' . $verbleibendeTage . ' Tage ' . 
         $verbleibendeStunden . ' Stunden und ' . 
         $verbleibendeMinuten . ' Minuten</div>';  
	echo '</div>';
?>
	
	</div>
</body>
</html>
