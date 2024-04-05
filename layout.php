<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deine Website</title>
    <link rel="stylesheet" href="css/navi.css">
    <?php echo $stylesheetLink;?>
</head>
<body>
    <?php include 'navi.php'; ?>
    <?php include $content; ?>
</body>
</html>
