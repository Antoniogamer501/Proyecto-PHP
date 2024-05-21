<?php

    if(!isset($_POST['ok'])){
        http_response_code(403);
        header("refresh:5,url=usuarioForm.php");
        die("No es posible entrar directamente a esta pagina, redirigiendo...");
    }

    require_once('./classes/Usuario.class.php');

    $nom = $_POST['nom'];
    $apat = $_POST['apat'];
    $amat = $_POST['amat'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    //Instanciamiento: la accion nde crear un objeto con valores de una plantilla de una clase
    
    $usu1 = new Usuario($nom, $apat, $amat, $user, $email, $pass);

    $usu1 -> saveOnFile();
    echo "Informacion Guardada Exitosamente.";
    header('refresh:3;url=usuarioForm.php');
    //$jsonUsu1 = Json_encode($usu1,JSON_UNESCAPED_UNICODE);

    //echo $jsonUsu1;
    /*
    $usu2 = new Usuario("María", "Sanchez", "Vázquez", "Oscar", "ana@gmail.com", "123456");
    */

    /*
    var_dump($usu1);
    echo "<br><br>";
    var_dump($usu2); */
    //$usu1 -> mostrarUser();
    

    
?>