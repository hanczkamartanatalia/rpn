<?php

if(!file_exists('classes/FileChecker.php')) throw new Exception("Missing file: ".'FileChecker.php');
include 'classes/FileChecker.php';


$filesPatchList = array('interfaces/RPNIO.php','classes/RPN.php','classes/OperatorService.php','classes/StackService.php');
FileChecker::VerifyFilesExist($filesPatchList);
FileChecker::includeFiles($filesPatchList);

class RPNService extends RPN implements RPNIO
{
    public function convertToRPN():string
    {
        $stack = array();
        $output = "";
        
        foreach(str_split($this->task) as $char)
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
                case array_key_exists($char,OperatorsService::$operatorPriority):
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
                if($itemList != '(') $output[] = $itemList; 
            }
        }

        return $output;
    }
    
    
    public function calculate():float
    {
        $stack = array();
        $output = 0.0;
        
        $charsList = explode(' ', $this->task);

        foreach($charsList as $char)
        {
           switch($char){
            case is_numeric($char): 
                {
                    $stack[]= $char;
                    break;
                }
                case OperatorsService::isOperator($char):
                {
                    $younger = array_pop($stack);
                    $older = array_pop($stack);
                    $stack[] = self::calculateTheValue($younger, $older, $char);
                }
           }
        }

        $output = $stack[0];
        return $output;
    }


    

    private static function calculateTheValue(float $younger, float $older, string $operator)
    {
        switch($operator)
	{
		case '+': 
			return $older + $younger;
		case '-': 
			return $older - $younger;
		case '*': 
			return $older * $younger;
		case '/': 
			return $older / $younger;
        case '^':
            return $older ^ $younger;
	}
	return 0;
    }


}

?>