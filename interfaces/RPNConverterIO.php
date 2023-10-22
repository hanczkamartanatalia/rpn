<?php

interface RPNConverterIO
{
    public function convertToRPN(string $input):string;
}

?>