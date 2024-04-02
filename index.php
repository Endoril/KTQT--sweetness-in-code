<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'start';
    switch ($page) {
        case 'start':
            include 'start.php';
            break;
        case 'ithumor':
            include 'ithumor.php';
            break;
        case 'projects':
            include 'projects.php';
            break;
        case 'timer':
            include 'timer.php';
            break;
        case 'legal':
            include 'legal.php';
            break;
        case 'gaestebuch':
            include 'gaestebuch.php';
            break;
        default:
            include 'start.php';
            break;
    }
?>