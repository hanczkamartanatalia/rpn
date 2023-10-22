<?php

#TODO
/*
Tutaj cały algorytm od liczenia z RPN wyniku

*/

$file ="../interfaces/RPNCalculateIO.php";

if(!file_exists($file)){
    throw new Exception("Missing file: RPN.php");
}
include $file;


class RPNCalculate implements RPNCalculateIO
{
    public function calculate(string $input):float
    {
        $stack = array();
        $result = 0.0;
        return $result;
    }
}

?>