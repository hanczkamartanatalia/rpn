<?php

interface RPNIO
{
    /* 
    Zrobiłam z niej funkcję statyczną, ponieważ nie odpowiadała mi zaproponowana wersja.
    Widziałam tu dwa rozwiązania,natomiast żadna nie była tą zaproponowaną.
    Wersja pierwsza: funkcja statyczna
    Wersja druga: bez przekazanego parametru do funkcji, tylko pobranie jej z pola instancji, na której wywołujemy funkcję.

    Oczywiście zaproponowana wersja jest wykonalna, natomiast nie widziałam sensu w tworzeniu instancji obiektu, wywołania funkcji 
    i przekazania wartości pola ręcznie
     */
    public static function calculate(string $input):float;
}

?>