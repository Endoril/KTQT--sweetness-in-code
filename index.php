<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTQT - sweetness in code ...</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
        }

        p {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div>
        <a href="index.php?page=start">Start</a> |
        <a href="index.php?page=contacts">Kontakte</a> |
        <a href="index.php?page=projects">Projekte</a> |
        <a href="index.php?page=timer">Countdown</a> |
        <a href="index.php?page=legal">Impressum</a>
    </div>

    <?php
    date_default_timezone_set('Europe/Berlin');
    $aktuelleZeitzone = date_default_timezone_get();

    $aktuelleZeitUTC1 = strtotime(date('H:i:s'));
    $stundeUTC1 = date('H', $aktuelleZeitUTC1);

    date_default_timezone_set('America/New_York');
    $aktuelleZeitzone = date_default_timezone_get();

    $aktuelleZeitUTC5 = strtotime(date('H:i:s'));
    $stundeUTC5 = date('H', $aktuelleZeitUTC5);

    function grussbotschaft($stunde, $language)
    {
        if ($stunde >= 5 && $stunde < 12) {
            return ($language === 'en') ? "Good morning! Rise and shine!" : "Guten Morgen!";
        } elseif ($stunde >= 12 && $stunde < 18) {
            return ($language === 'en') ? "Hello, sunshine! Have a safe and productive day!" : "Guten Tag!";
        } else {
            return ($language === 'en') ? "Evening vibes! Time to relax! " : "Guten Abend!";
        }
    }

    $headline = '';
    $output = '';

    switch ($_GET['page']) {
        case 'contacts':
            $headline = 'Deine Kontakte';
            $output = '<p> Hier siehst du deine <b>Kontakte</b></p>';
            break;
        case 'projects':
            $headline = 'Meine Projekte';
            $output = '<p>Hier siehst du meine <b>Projekte</b></p>';
            break;
        case 'timer':
            header("Refresh:60");
            $headline = 'Countdown bis zur Pr&uuml;fung';
            $output   = '<p>Hier siehst du den <b>Countdown</b> bis zur meiner IHK-Pr&uuml;fung</p>';
            date_default_timezone_set('UTC');
            $headline = 'Tage bis zu meiner Prüfung:';
            $output  .= '<div style="font-size: 30px;">' .
                ' Datum und Uhrzeit: ' . date('d.m.Y H:i:s') .
                ' <div style="font-size: 12px;">
                Uhrzeit (UTC +1): ' . date('H:i:s', strtotime('+1 hours')) . ' --- Uhrzeit (UTC -5): ' . date('H:i:s', strtotime('-5 hours')) .
                '</div>' .
                '</div>';
            $heute = strtotime(date('Y-m-d'));
            $zielDatum = strtotime('2025-05-07');
            $verbleibendeZeit = $zielDatum - $heute;
            $verbleibendeTage = ceil($verbleibendeZeit / (60 * 60 * 24));
            $output .=  '<div style="font-size: 36px; color: #DC143C">Noch ' . $verbleibendeTage . ' Tage </div>';
            break;
        case 'legal':
            $headline = 'Impressum';
            $output = '<p>Hier siehst du das <b>Impressum</b></p>';
            break;
        default:
            echo '<h1 style="font-size: 36px; font-weight: bold;">' . $headline . ' Hallöchen und ' . grussbotschaft($stundeUTC1, 'de') . '</h1>';
            break;
    }

    echo '<h1 style="font-size: 24px; font-family: Arial, sans-serif;">' . $headline . '</h1>';
    echo "<p> $output </p>";

    if ($_GET['page'] == 'start') {
        echo '<h1 style="font-size: 24px; font-weight: bold;">'. grussbotschaft($stundeUTC1, 'en') . '</h1>';
    }
    ?>
</body>

</html>
