<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <?php
    session_start();
    echo "Welcome " .$_SESSION['email'];
    ?>
</body>
</html>