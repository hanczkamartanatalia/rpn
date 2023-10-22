<?php

class OperatorsService
{
    public static $operatorPriority = array(
        '^' => 1,
        '*' => 2,
        ':' => 2,
        '+' => 3,
        '-' => 3
    );
    
    public static function findOperatorPriority($char): int
    {
        foreach(self::$operatorPriority as $key => $listItem)
        {
            if($key == $char) return $listItem;
        }

        throw new Exception("Unidentified character: ".$char);
    }

    public static function isOperator(string $char):bool
    {
        if(!array_key_exists($char,self::$operatorPriority)) return false;
        
        return true;
    }

}
?>