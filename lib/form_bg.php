<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    try{
        if(file_exists("classes/RPN.php")) require_once "classes/RPN.php";

        $conventionalNotation = $_POST['conventionalNotation'];
        $object = new RPN($conventionalNotation);

        echo "Podany przykład: ".$object->getConventionalNotation()."</br>";
        echo "Notacja ONP: ". $object->getRPNNotation()."</br>";
        echo "Wynik: ". $object->getResult()."</br>";


    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
}
?>