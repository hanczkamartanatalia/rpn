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
        RPNValidate::validateAllChars($ConventionalNotation);
        RPNValidate::validateFirstChar($ConventionalNotation);
        RPNValidate::validateBrackets($ConventionalNotation);
        RPNValidate::validateCharNextToTheBracket($ConventionalNotation,'(');
        RPNValidate::validateCharNextToTheBracket(strrev($ConventionalNotation), ')');
        
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