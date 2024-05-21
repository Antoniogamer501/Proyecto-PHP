<?php

/*
Expresiones regulares
/^ $/
^ <-- indica el inicio de la busqueda de una expresion regular
$ <-- indica el final de la busqueda de una expresion regular

[] <-- agrupan una serie de caracteres
() <-- agrupan diversos grupos de series
{n} <-- repite la ocurrencia n número de veces

* <-- 0 o más repeticiones de la cadena
+ <-- 1 o más repeticiones de la cadena
? <-- 0 o 1 repetición de la cadena

| <-- incluir varias opciones de búsqueda 

*/

function valUser ($user) {
    if (preg_match("/^[a-zA-Z]{3}[0-9]{3}[\*\.\_\#]$/",$user)) {
        return "true";
    }
    else{
        return "false";
    }
}

function valRFC ($rfc) {
    if (preg_match("/^[A-Z]{4}[0-9]{6}[\-][A-Z0-9]{3}$/",$rfc)) {
        return "Si es un RFC";
    }
    else{
        return "No es un RFC valido";
    }
}

function valFecha ($fecha) {
    if (preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(20[0-2][0-9]|2030)$/",$fecha)) {
        return "Si es una fecha valida";
    }
    else{
        return "No es una fecha valida";
    }
}

function valHora ($hora) {
    if (preg_match("/^([0-1][0-9]|2[0-3])\:([0-5][0-9])\:([0-5][0-9])$/",$hora)) {
        return "Si es una hora valida";
    }
    else {
        return "No es una hora valida";
    }
}

$res = valHora("23:59:59");

//$res = valFecha("15/05/2014");
//echo $res;

//$res = valRFC("SATH840517-BQ3");
echo $res;

/*
$res = valUser("abc123*");
echo $res;
*/

?>