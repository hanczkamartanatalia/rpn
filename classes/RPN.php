<?php

if(file_exists('classes/FileService.php')) include_once 'classes/FileService.php';

$filesPatchList = array('classes/RPNValidate.php','classes/RPNService.php',);
FileService::VerifyFilesExist($filesPatchList);
FileService::includeFiles($filesPatchList);


class RPN{

    private string $conventionalNotation;
    private string $RPNNotation;
    private float $result;

    public function __construct($ConventionalNotation) 
    {
        if(!RPNValidate::validateAllChars($ConventionalNotation)) throw new Exception("There is an invalid character in the given string: ".$ConventionalNotation);
        if(!RPNValidate::validateFirstChar($ConventionalNotation)) throw new Exception("Invalid first character: ".$ConventionalNotation);
        if(!RPNValidate::validateBrackets($ConventionalNotation)) throw new Exception("The number of opening and closing brackets should be the same: ".$ConventionalNotation);

        $this->conventionalNotation = $ConventionalNotation;
        $this->RPNNotation = RPNService::convertToRPN($this->conventionalNotation);
        $this->result = RPNService::calculate($this->RPNNotation);
    }

    public function getConventionalNotation(): string
    {
        return $this->conventionalNotation;
    }  
    
    public function getRPNNotation(): string
    {
        return $this->RPNNotation;
    }
    
    public function getResult(): string
    {
        return $this->result;
    } 
}

?>