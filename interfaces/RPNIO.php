<?php

interface RPNIO
{
    public function validate(string $input):bool;
    public function convertToRPN(string $input):string;
    public function calculate(string $input):float;
}

?>