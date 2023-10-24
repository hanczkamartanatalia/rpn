<?php
class StringService{

    public static function removeSpaceAtTheEnd(string &$input)
    {
        if (substr($input, -1) === ' ') {
            $input = substr($input, 0, -1);
        }
    }

    public static function countTheNumbersInTheText(string &$input): int
    {
        $previewChar = "";
        $count = 0;

        foreach(str_split($input) as $char)
        {
            if(is_numeric($char) && !is_numeric($previewChar))
            {
                $count++;
            }
            $previewChar = $char;
        }
        return $count;
    }

    public static function countTheOperatorsInTheText(string $input): int
    {
        $count = 0;
        $operatorsList = array('/','^','*','+','-');

        for ($i = 0; $i < strlen($input); $i++) {
            
            if($input[$i] == '-' && ($i == 0 || $input[$i-1] == '('))
            {
                continue;
            }

            if (in_array($input[$i], $operatorsList) !== false) 
            {
                $count++;
            }
        }
        return $count;
    }
}

?>