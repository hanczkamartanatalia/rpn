<?php

interface RPNIO
{
    /* 
    Zrobiłam z niej funkcję statyczną, ponieważ nie odpowiadała mi zaproponowana wersja.
    Widziałam tu dwa rozwiązania,natomiast żadna nie była tą zaproponowaną.
    Wersja pierwsza: funkcja statyczna
    Wersja druga: bez przekazanego parametru do funkcji, tylko pobranie jej z pola instancji, na której wywołujemy funkcję.
     */
    public static function calculate(string $input):float;
}

?>