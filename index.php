<!DOCTYPE html>
<html lang="pl-PL"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>ONP Kalkulator</title>
</head>
<body>
    <div>
        <h1 class="header">Podaj wyrażenie do policzenia</h1>
    </div>
    <?php
    if(file_exists("views/form.php"))include_once "views/form.php";
    ?>
</body>
</html>
