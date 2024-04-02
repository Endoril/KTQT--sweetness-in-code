<?php

	// Inch zu Zentimeter
	function convertInchToCm($inches) {
		return $inches * 2.54;
	}

	// Inch zu Meter
	function convertInchToMeter($inches) {
		return $inches * 0.0254;
	}

	// Fahrenheit zu Celsius
	function convertFahrenheitToCelsius($fahrenheit) {
		return ($fahrenheit - 32) * 5 / 9;
	}
	
	function convertEuToUsSizeWomenPants($euSize) {
    // Definiere ein Array mit Key-Value-Paaren für die Größenumrechnung
    $conversionTable = 
	[
        32 => 4, 
        34 => 6, 
        36 => 8,
		38 => 4, 
        40 => 6, 
        42 => 8,
		44 => 6, 
        46 => 8,
		48 => 6, 
        50 => 8,
		52 => 6,     
    ];
    
    // Überprüfe, ob die EU-Größe im Umrechnungs-Array vorhanden ist und gib die entsprechende US-Größe zurück
    if(array_key_exists($euSize, $conversionTable)) {
        return $conversionTable[$euSize];
    } else {
        return "Unbekannte Größe"; // Rückmeldung, falls die Größe nicht gefunden wird
    }
}


?>
