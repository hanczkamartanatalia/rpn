<?php

class RPN{

    protected string $task;

    public function __construct($Task) 
    {
        if(!RPNValidate::validateAllChars($Task)) throw new Exception("There is an invalid character in the given string: ".$Task);
        if(!RPNValidate::validateFirstChar($Task)) throw new Exception("Invalid first character: ".$Task);
        if(!RPNValidate::validateBrackets($Task)) throw new Exception("The number of opening and closing brackets should be the same: ".$Task);

        $this->task = $Task;
    }

    public function getTask(): string
    {
        return $this->task;
    }  
}

?>