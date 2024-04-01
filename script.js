	// Variablen zur Verwaltung der Bildvorschau und Navigation
	let modal = document.getElementById('previewModal');
	let fullImage = document.getElementById('fullImage');
	let captionText = document.getElementsByClassName('caption')[0];
	let galleryImages = document.querySelectorAll('.gallery-image');
	let currentImageIndex;

	// Funktion zum Öffnen des Modals und Anzeigen des angeklickten Bildes
	function openPreview(src) {
		modal.style.display = "block";
		fullImage.src = src;
		captionText.innerHTML = src.split('/').pop(); // Zeigt den Bildnamen als Untertitel
		currentImageIndex = Array.from(galleryImages).findIndex(image => image.src === src);
	}

	// Funktion zum Schließen des Modals
	function closePreview() {
		modal.style.display = "none";
	}

	// Funktion zum Wechseln des Bildes
	function changeImage(direction) {
		currentImageIndex += direction;
		if (currentImageIndex >= galleryImages.length) {
			currentImageIndex = 0;
		} else if (currentImageIndex < 0) {
			currentImageIndex = galleryImages.length - 1;
		}
		openPreview(galleryImages[currentImageIndex].src);
	}

	// Event-Listener für das Schließen des Modals
	window.onclick = function(event) {
		if (event.target === modal) {
			closePreview();
		}
	}

	// Event-Listener für Tastatureingaben
	document.addEventListener('keydown', function(event) {
		if (modal.style.display === "block") {
			if (event.key === 'ArrowRight') {
				changeImage(1); // Nächstes Bild
			} else if (event.key === 'ArrowLeft') {
				changeImage(-1); // Vorheriges Bild
			} else if (event.key === 'Escape') {
				closePreview(); // Modal schließen
			}
		}
	});
