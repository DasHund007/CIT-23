<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP clock</title>
</head>
<body>
    <div id="clock">
        <?php
            date_default_timezone_set('Europe/Berlin');
            echo date("H:i:s");
        ?>
    </div>
</body>
</html>