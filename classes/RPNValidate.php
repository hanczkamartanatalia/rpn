<?php

class RPNValidate{

    #TODO Sprawdz czy przed i po nawiasie jest operator

    public static function validateAllChars(string $input):bool
    {
        $allowedChars = array(' ','.','/','^','*','+','-',')','(', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        
        foreach (str_split($input) as $char) {
            if (!in_array($char, $allowedChars)) {
                return false;
            }
        }

        return true;
    }

    public static function validateFirstChar(string $input):bool
    {
        $invalidFirstChar = array(' ','.','/','^','*','+',')');
        
        if (in_array($input[0], $invalidFirstChar)) 
        {
            return false;
        }

        return true;
    }

    public static function validateBrackets(string $input):bool
    {
        $openingBracket = 0;
        $closingBracket = 0;

        foreach (str_split($input) as $char) 
        {
            if($char == '(') $openingBracket++;
            if($char == ')') $closingBracket++;
        }

        if($openingBracket == $closingBracket) return true;
        else return false;
    }

}

?>