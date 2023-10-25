<?php

if(!file_exists('classes/FileService.php')) throw new Exception("Missing file: ".'FileService.php');
include_once 'classes/FileService.php';


$filesPatchList = array(
    'interfaces/RPNIO.php',
    'classes/RPN.php',
    'classes/OperatorService.php',
    'classes/StackService.php', 
    'classes/CalculateService.php',
    'classes/StringService.php');

FileService::VerifyFilesExist($filesPatchList);
FileService::includeFiles($filesPatchList);

class RPNService implements RPNIO
{
       
    public static function calculate(string $input):float
    {
        $stack = array();
        $charsList = explode(' ', $input);

        foreach($charsList as $char)
        {
            switch($char){
                case is_numeric($char): 
                {
                    $stack[]= $char;
                    break;
                }
                case 0:
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

    public static function convertToRPN(string $input):string
    {
        $stack = array();
        $output = "";
        $previousChar = "";
        
        foreach(str_split($input) as $char)
        {
            switch($char)
            {
                case ' ': break;
                case '.':
                {
                    // is this a decimal number
                    $output = substr($output, 0, -1);
                    $output.=$char;
                    $previousChar = $char;
                    break;
                }
                case is_numeric($char): 
                {
                    if(is_numeric($previousChar))
                    {
                        $output = substr($output, 0, -1);
                    }
                    $output.=$char." ";
                    $previousChar = $char;
                    break;
                }
                case 0:
                {
                    if(is_numeric($previousChar))
                    {
                        $output = substr($output, 0, -1);
                    }
                    $output.=$char." ";
                    $previousChar = $char;
                    break;
                } 
                case '(':
                {
                    $stack[]=$char;
                    $previousChar = $char;
                    break;
                }
                case ')':
                {
                    StackService::removingFromStackToBracket($stack, $output);
                    $previousChar = $char;
                    break;
                }
                case array_key_exists($char,OperatorService::$operatorPriority):
                {
                    // whether the first number is negative
                    if((empty($output) || $previousChar=='(') && $char == '-') 
                    {
                        $output.=$char;
                        $previousChar = $char;
                        break;
                    }
                    else if(StackService::isAHigherOperatorInTheStack($char,$stack))
                    {
                        StackService::removingFromStackToBracketOrLowerPriorityOperator($stack, $output,$char);
                    }

                    $stack[]=$char;
                    $previousChar = $char;
                    break;
                }
            }
        }        

        StackService::addStackToString($stack,$output);
        StringService::removeSpaceAtTheEnd($output);

        return $output;
    }
}

?>