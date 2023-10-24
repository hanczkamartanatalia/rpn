<?php

class StackService{

public static function removingFromStackToBracket(&$stack, &$output, bool $removeWithBracket)
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
        if($removeWithBracket) array_pop($stack);
        
    }

    public static function isAHigherOperatorInTheStack($char,$stack):bool
    {
        $operatorPriorityOfAGivenChar = OperatorService::findOperatorPriority($char);

        $reverseStack = array_reverse($stack);
        foreach( $reverseStack as $element)
        {
            if($element == '(')
            {
                return false;
            }
            else if($element != '(')
            {
                $operatorPriorityFromTheStack = OperatorService::findOperatorPriority($element);
                if($operatorPriorityFromTheStack <= $operatorPriorityOfAGivenChar) return true;
            } 
        }
        
        return false;
    }

    public static function addStackToString($stack,&$output)
    {
        if(!empty($stack)){
            $reverseStack = array_reverse($stack);
            foreach($reverseStack as $itemList)
            {
                if($itemList != '(') $output.= $itemList.' '; 
            }
        }
    }
}
?>