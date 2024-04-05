<?php

	$page = isset($_GET['page']) ? $_GET['page'] : 'startcontent';
	$content = '';
	$stylesheetLink = '';

	switch ($page) {
		case 'start':
			$pageTitle = 'KTQT - sweetness in code...';
			$stylesheetLink = '<link rel="stylesheet" href="css/startcontent.css">';
			$content = 'startcontent.php';
			break;
		case 'ithumor':
			$pageTitle = 'Informatikerinnenhumor';
			$stylesheetLink = '<link rel="stylesheet" href="css/ithumor.css">';
			$content = 'ithumor.php';
			break;
		case 'projects':
			$pageTitle = 'Projekte';
			$stylesheetLink = '<link rel="stylesheet" href="css/projects.css">';
			$content = 'projects.php';
			break;
		case 'timer':
			$pageTitle = 'Countdown';
			$stylesheetLink = '<link rel="stylesheet" href="css/timer.css">';
			$content = 'timer.php';
			break;
		case 'legal':
			$pageTitle = 'Impressum';
			$content = 'legal.php';
			break;
		case 'umrechner':
			$pageTitle = 'Umrechner';
			$stylesheetLink = '<link rel="stylesheet" href="css/umrechner.css">';
			$content = 'umrechner.php';
			break;
		case 'aim':
			$pageTitle = 'K.T.Q.T.';
			$stylesheetLink = '<link rel="stylesheet" href="css/aim.css">';
			$content = 'aim.php';
			break;
		case 'gaestebuch':
			$pageTitle = 'Gästebuch';
			$stylesheetLink = '<link rel="stylesheet" href="css/gaestebuch.css">';
			$content = 'gaestebuch.php';
			break;
		default:
			$pageTitle = 'Willkommen bei KTQT';
			$content = 'startcontent.php';
			break;
	}

	require 'layout.php';

?>