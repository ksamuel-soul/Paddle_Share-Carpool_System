<?php
require ('fpdf.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='POST' action='pdf.php'>
        <input type='text' name='uname'>
        <input type='text' name='pass'> 
        <input type='submit' name='submit'>
    </form>
</body>
</html>