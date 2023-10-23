<?php

interface RPNIO
{
    public static function convertToRPN(string $input):string;

    /* Pozwoliłam sobie na zrobienie z niej funkcji statycznej aby lepiej pasowało do zaproponowanego przeze mnie rozwiązania.
     */
    public static function calculate(string $input):float;
}

?>