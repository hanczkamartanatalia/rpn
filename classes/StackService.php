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
        array_pop($stack);
        
    }
    public static function removingFromStackToBracketOrLowerPriorityOperator(&$stack, &$output, $operator)
    {
        $reverseStack = array_reverse($stack);
        $operatorPriority = OperatorService::findOperatorPriority($operator);
        foreach( $reverseStack as $key => $element)
        {
            if($element == '(') break;
            
            if(OperatorService::isOperator($element))
            {
                $elemPriority = OperatorService::findOperatorPriority($element);
                if($elemPriority>$operatorPriority) break;
            }
            
            $output.=$element." ";
            unset($reverseStack[$key]);  
        }

        $stack = array_reverse($reverseStack);
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
            
            $operatorPriorityFromTheStack = OperatorService::findOperatorPriority($element);
            if($operatorPriorityFromTheStack <= $operatorPriorityOfAGivenChar) return true;

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