<?php

        if(!isset($_POST['submit'])){
            http_response_code(403);
            header("refresh:5,url=index.php");
            die("No es posible entrar directamente a esta pagina, redirigiendo...");
        }
    
        require_once('./classes/pizza.class.php');
    
        // Guarda los datos en variables
        $tamano = $_POST['tamano'];
        $masa = $_POST['masa'];
        $borde = $_POST['borde'];
        // Verifica si se han seleccionado ingredientes y los guarda en una variable
        $ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : [];
        // Verifica si se ha enviado algún comentario y lo guarda en una variable
        $comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : "";
    
        //Instanciamiento: la accion nde crear un objeto con valores de una plantilla de una clase
        
        $pedido1 = new Pizza($tamano, $masa, $borde, $ingredientes, $comentarios);
    
        $pedido1 -> saveOnFile();
        echo "Pedido enviado Exitosamente.";
        header('refresh:3;url=index.php');
?>