<?php	
    // Dies muss mit Vorsicht verwendet werden, da es die gesamte Seite aktualisiert.
    // Es ist besser, wenn möglich, eine JavaScript-Lösung für den Countdown zu verwenden.
    header("Refresh:60");
    date_default_timezone_set('UTC-1');
    $jetzt = time();
    $zielDatum = strtotime('2025-05-07');
    $verbleibendeSekunden = $zielDatum - $jetzt;
    
    $verbleibendeTage = floor($verbleibendeSekunden / (60 * 60 * 24));
    $verbleibendeStunden = floor(($verbleibendeSekunden % (60 * 60 * 24)) / (60 * 60));
    $verbleibendeMinuten = floor(($verbleibendeSekunden % (60 * 60)) / 60);
?>

<div class="timer">
    <h1>Countdown bis zur Prüfung</h1> 
    <p>Hier siehst du den Countdown bis zu meiner IHK-Prüfung</p>
    <div class="date-time">Datum und Uhrzeit: <?php echo date('d.m.Y H:i:s'); ?></div>
    <div class="countdown">
        Noch <?php echo $verbleibendeTage; ?> Tage 
        <?php echo $verbleibendeStunden; ?> Stunden und 
        <?php echo $verbleibendeMinuten; ?> Minuten
    </div>
</div>
