	<div class="galerie">
	
<?php
    // Der Pfad zum Verzeichnis mit den Bildern
    $verzeichnis = 'uploads'; 

    // Alle Bilddateien auslesen
    $bilder = glob($verzeichnis . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

    // Dateien nach Änderungsdatum sortieren, neueste zuerst
    usort($bilder, function($a, $b) {
        return filemtime($b) - filemtime($a);
    });

    // Bilder anzeigen
    foreach ($bilder as $bild) {
        // Erzeugt den korrekten relativen Pfad für jedes Bild
        $bildpfad = $verzeichnis . '/' . basename($bild);
        echo '<img src="'.$bildpfad.'" alt="Bild" class="gallery-image" onclick="openPreview(\''.$bildpfad.'\')">';
    }
?>

	</div>  

	<div id="previewModal" class="modal">
		<span class="close" onclick="closePreview()">&times;</span>
		<img class="modal-content" id="fullImage">
		<div class="caption"></div>
		<a class="prev" onclick="changeImage(-1)">&#10094;</a>
		<a class="next" onclick="changeImage(1)">&#10095;</a>
	</div>

	<script src="script.js"></script> <!-- Stellen Sie sicher, dass der Pfad zu Ihrer JavaScript-Datei korrekt ist -->
