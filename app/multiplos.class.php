<?php


class multiplos
{

    public function __construct()
    {
    }

    public function verificaMultiploTres($numero){

        return (($numero % 3) == 0) ? true : false;

    }

    public function verificaMultiploCinco($numero)
    {

        return (($numero % 5) == 0) ? true : false;

    }



}



