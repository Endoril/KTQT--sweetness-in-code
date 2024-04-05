<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Umrechner</title>
    <style>
        .converter-section {
            text-align: center;
            margin-top: 50px;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php require_once 'converter.php'; ?>

    <div class="converter-section">
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
            if (isset($_POST['convertToCm'])) {
                $inches = $_POST['inches'];
                $cm = convertInchToCm($inches);
                echo "<p class='result'>{$inches} Inch entsprechen " . number_format($cm, 2) . " cm.</p>";
            }
                
            if (isset($_POST['convertEuToUsSizeWomenPants'])) {
                $euSize = $_POST['euSizeWomenPants'];
                $usSize = convertEuToUsSizeWomenPants($euSize);
                echo "<p class='result'>EU Damenhosengröße {$euSize} entspricht US Damenhosengröße {$usSize}.</p>";
            }
                
            if (isset($_POST['convertDollarToEuro'])) {
                $dollars = $_POST['dollars'];
                $euros = convertDollarToEuro($dollars);
                echo "<p class='result'>{$dollars} Dollar entsprechen etwa " . number_format($euros, 2) . " Euro.</p>";
            }
        ?>
    </div>
</body>
</html>
