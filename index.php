<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONP Kalkulator</title>
</head>
<body>
    <div>
        <h1 class="header">Podaj wyrażenie do policzenia</h1>
        <form name="sendTask" action="">
            <input type="text">

        </form>

    </div>
</body>
</html>

<?php

try{
    include "classes/FileService.php";
    FileService::IsFileExist('classes/RPN.php');
    

    
}
catch(Exception $ex)
{
    echo $ex->getMessage();
}

?>