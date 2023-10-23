<?php

if(!file_exists('classes/FileService.php')) throw new Exception("Missing file: ".'FileService.php');
include_once 'classes/FileService.php';


$filesPatchList = array('interfaces/RPNIO.php','classes/RPN.php','classes/OperatorService.php','classes/StackService.php', 'classes/CalculateService.php');
FileService::VerifyFilesExist($filesPatchList);
FileService::includeFiles($filesPatchList);

class RPNService implements RPNIO
{
    public static function convertToRPN(string $input):string
    {
        $stack = array();
        $output = "";
        
        foreach(str_split($input) as $char)
        {
            switch($char)
            {
                case ' ': break;
                case ',':
                {
                    $output.=$char;
                    break;
                }
                case is_numeric($char): 
                {
                    $output.=$char." ";
                    break;
                }
                case '(':
                {
                    $stack[]=$char;
                    break;
                }
                case ')':
                {
                    StackService::removingFromStackToBracket($stack, $output);
                    break;
                }
                case array_key_exists($char,OperatorService::$operatorPriority):
                {
                    if(StackService::isAHigherOperatorInTheStack($char,$stack))
                    {
                        StackService::removingFromStackToBracket($stack, $output);
                    }
                    $stack[]=$char;
                    break;
                }
            }
        }        

        if(!empty($stack)){
            $reverseStack = array_reverse($stack);
            foreach($reverseStack as $itemList)
            {
                if($itemList != '(') $output.= $itemList; 
            }
        }

        return $output;
    }
    
    
    public static function calculate(string $input):float
    {
        $stack = array();
        $output = 0.0;
        
        $charsList = explode(' ', $input);

        foreach($charsList as $char)
        {
           switch($char){
            case is_numeric($char): 
                {
                    $stack[]= $char;
                    break;
                }
            case OperatorService::isOperator($char):
                {
                    $younger = array_pop($stack);
                    $older = array_pop($stack);
                    $stack[] = CalculateService::calculateTheValue($younger, $older, $char);
                }
           }
        }

        $output = $stack[0];
        return $output;
    }


    

    
}

?>