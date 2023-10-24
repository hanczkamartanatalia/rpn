<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    try{
        if(file_exists("classes/RPN.php")) require_once "classes/RPN.php";

        $conventionalNotation = $_POST['conventionalNotation'];
        $object = new RPN($conventionalNotation);

        echo "Example given: ".$object->getConventionalNotation()."</br>";
        echo "RPN notation: ". $object->getRPNNotation()."</br>";
        echo "Result: ". $object->getResult()."</br>";


    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
}
?>