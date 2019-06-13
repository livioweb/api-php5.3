<?php
include_once "multiplos.class.php";
echo "inicio programa<br>";
function __MAIN__(){

    $mult = new multiplos();
    for($i=1;$i<=100;$i++){

        if($mult->verificaMultiploTres($i) && $mult->verificaMultiploCinco($i)){
            echo "FizzBuzz";
        }
        elseif ($mult->verificaMultiploTres($i)){
            echo "Fizz";
        }
        elseif ($mult->verificaMultiploCinco($i)){
            echo "Fizz";
        }else{
            echo $i;
        }
        echo "<br>";

    }

}

__MAIN__();
