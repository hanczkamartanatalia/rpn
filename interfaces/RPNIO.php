<?php

interface RPNIO
{
    public function convertToRPN():string;

    /* Pozwoliłam sobie na zmianę funkcji z powodu znanych przeze mnie rozwiązań. 
    Nie pasował mi fakt, że klasa nie jest statyczna i mam przekazać argument przez funkcję.
    Uznałam za lepsze rozwiązanie wykorzystać pole z klasy, skoro i tak tworzę instancję klasy.
     */
    public function calculate():float;
}

?>