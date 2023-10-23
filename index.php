<!DOCTYPE html>
<html lang="pl-PL"></html>
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
    include "classes/RPN.php";

    $a = new RPN('1+2*(2+1)');
    echo $a->getConventionalNotation().'<br>';
    echo $a->getRPNNotation().'<br>';
    echo $a -> getResult().'<br>';
    
}
catch(Exception $ex)
{
    echo $ex->getMessage();
}

?>