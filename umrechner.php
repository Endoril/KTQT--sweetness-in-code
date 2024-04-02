<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umrechner</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navigation.css">   
</head>
<body>

<?php include 'navi.php'; ?>
<?php require_once 'converter.php'; ?>

	<div class="converter-section" style="text-align: center; margin-top: 50px;">
		<h1>Umrechner</h1>
		
		<!-- Inch zu cm Umrechner -->
		<form method="post">
			<input type="number" name="inches" placeholder="Inch eingeben" required>
			<input type="submit" name="convertToCm" value="In cm umrechnen">
		</form>
		
		<!-- EU zu US Damenhosen Größen Umrechner -->
		<form method="post">
			<input type="number" name="euSizeWomenPants" placeholder="EU Größe Damenhose" required>
			<input type="submit" name="convertEuToUsSizeWomenPants" value="In US Damenhosengröße umrechnen">
		</form>
		
		<!-- Dollar zu Euro Umrechner -->
		<form method="post">
			<input type="number" name="dollars" placeholder="Dollar eingeben" required>
			<input type="submit" name="convertDollarToEuro" value="In Euro umrechnen">
		</form>

		<?php
		if (isset($_POST['convertToCm'])) 
		{
			$inches = $_POST['inches'];
			$cm = convertInchToCm($inches);
			echo "<p>{$inches} Inch entsprechen {$cm} cm.</p>";
		}
		
		if (isset($_POST['convertEuToUsSizeWomenPants'])) 
		{
			$euSize = $_POST['euSizeWomenPants'];
			$usSize = convertEuToUsSizeWomenPants($euSize);
			echo "<p>EU Damenhosengröße {$euSize} entspricht US Damenhosengröße {$usSize}.</p>";
		}
		
		if (isset($_POST['convertDollarToEuro'])) 
		{
			$dollars = $_POST['dollars'];
			$euros = convertDollarToEuro($dollars);
			echo "<p>{$dollars} Dollar entsprechen etwa {$euros} Euro.</p>";
		}
?>
	</div>

</body>
</html>
