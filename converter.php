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

// Dollar zu Euro
function convertDollarToEuro($dollars) {
    $exchangeRate = 0.92; // Fiktiver Wechselkurs; 1 Dollar = 0.92 Euro
    return $dollars * $exchangeRate;
}

function convertEuToUsSizeWomenPants($euSize) {
    // Definiere ein Array mit Key-Value-Paaren für die Größenumrechnung
    $conversionTable = [
        32 => 0, 
        34 => 2, 
        36 => 4,
        38 => 6, 
        40 => 8, 
        42 => 10,
        44 => 12, 
        46 => 14,
        48 => 16, 
        50 => 18,
        52 => 20,     
    ];
    
    // Überprüfe, ob die EU-Größe im Umrechnungs-Array vorhanden ist und gib die entsprechende US-Größe zurück
    if(array_key_exists($euSize, $conversionTable)) {
        return $conversionTable[$euSize];
    } else {
        return "Unbekannte Größe"; // Rückmeldung, falls die Größe nicht gefunden wird
    }
}


