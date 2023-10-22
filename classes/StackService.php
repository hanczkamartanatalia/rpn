<?php

class StackService{

public static function removingFromStackToBracket(&$stack, &$output)
    {
        $reverseStack = array_reverse($stack);
        foreach( $reverseStack as $key => $element)
        {
            if($element != '(')
            {
                $output.=$element." ";
                unset($reverseStack[$key]);  
            } 
            else break;
        }

        $stack = array_reverse($reverseStack);
    }

    public static function isAHigherOperatorInTheStack($char,$stack):bool
    {
        $operatorPriorityOfAGivenChar = OperatorsService::findOperatorPriority($char);

        $reverseStack = array_reverse($stack);
        foreach( $reverseStack as $element)
        {
            if($element != '(')
            {
                $operatorPriorityFromTheStack = OperatorsService::findOperatorPriority($element);
                if($operatorPriorityFromTheStack > $operatorPriorityOfAGivenChar) return true;
            } 
        }
        
        return false;
    }

}
?>