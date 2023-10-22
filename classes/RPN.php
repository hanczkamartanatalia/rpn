<?php

$file = "../interface/RPNIO.php";
if(!file_exists($file)) throw new Exception("Missing file: ".$file);
include $file;



class RPN implements RPNIO{

    private string $task;

    public function __construct($task) 
    {
        if(self::validate($task))
        {
            $this->$task = $task;
        }
    }

    public function validate(string $input):bool
    {
        $allowedChars = array(' ',',','/','^','*','+','-',')','(', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        
        foreach (str_split($input) as $char) {
            if (!in_array($char, $allowedChars)) {
                return false;
            }
        }

        return true;
    }
    public function convertToRPN(string $input):string
    {
        return "";
    }
    public function calculate(string $input):float
    {
        return 0.0;
    }
}


?>