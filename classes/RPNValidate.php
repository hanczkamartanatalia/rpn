<?php

class RPNValidate{

    public static function validateAllChars(string $input)
    {
        $allowedChars = array(' ','.','/','^','*','+','-',')','(', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        
        foreach (str_split($input) as $char) {
            if (!in_array($char, $allowedChars)) {
                throw new Exception("There is an invalid character in the given string: ".$input);
            }
        }
    }

    public static function validateFirstChar(string $input)
    {
        $invalidFirstChar = array(' ','.','/','^','*','+',')');
        
        if (in_array($input[0], $invalidFirstChar)) 
        {
            throw new Exception("Invalid first character: ".$input);
        }
    }

    public static function validateBrackets(string $input)
    {
        $openingBracket = 0;
        $closingBracket = 0;

        foreach (str_split($input) as $char) 
        {
            if($char == '(') $openingBracket++;
            if($char == ')') $closingBracket++;
        }

        if($openingBracket == $closingBracket) return true;
        else throw new Exception("The number of opening and closing brackets should be the same: ".$input);
    }

    public static function validateCharNextToTheBracket(string $input, string $charNextToTheBracket)
    {
        $previewChar = '';
        foreach (str_split($input) as $char) 
        {
            if($char != $charNextToTheBracket)
            {
                $previewChar = $char;
                continue;
            }

            if(is_numeric($previewChar)) throw new Exception("Incorrect value: ".$input." There should be an operator next to the bracket");
            
        }
    }

}

?>