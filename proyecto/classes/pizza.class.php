<?php

class Pizza implements JsonSerializable{

    private $tamano;
    private $masa;
    private $borde;
    private $ingredientes;
    private $comentarios;

    function __construct($size="", $mass="", $border="", $ingredients="", $comments="")
    {
        $this -> tamano = $size;
        $this -> masa = $mass;
        $this -> borde = $border;
        $this -> ingredientes = $ingredients;
        $this -> comentarios = $comments;
    }

    function mostrarPedidos(){
        echo '<tr>';
        //echo '<td>'. $this->numero .'</td>';
        echo "<td>$this->tamano</td>";
        echo "<td>$this->masa</td>";
        echo "<td>$this->borde</td>";
        echo "<td>$this->ingredientes</td>";
        echo "<td>$this->comentarios</td>";
        echo '</tr>';
    }

    function saveOnFile(){
        //codificar objeto en JSON
        $jsonUser = json_encode($this,
        JSON_UNESCAPED_UNICODE |
        JSON_PRETTY_PRINT |
        JSON_NUMERIC_CHECK);

        //Designar nombre del archivo
        $filename = __DIR__ . "/../pedidos.json";

        //validar si el archivo no existe
        if(!file_exists($filename)){
            //crear el archivo nuevo
            $file = fopen($filename, "w");
            fwrite($file, "[\n");
        }
        else{
            //abrir el archivo existente
            $file = fopen($filename, "c");
            fseek($file, -2, SEEK_END);
            fwrite($file, ",\n");
        }

        //escribir la nueva informacion en el archivo
        fwrite($file, $jsonUser . "\n]");

        //cerrar el arhivo
        fclose($file);
    }

    function cargarPedidos(){
        $listaPedidos = array();
        $filename = __DIR__ . "/../pedidos.json";

        if(file_exists($filename)){
            $json = file_get_contents($filename);

            $pedidos = json_decode($json,false);

            //var_dump($users);
            foreach($pedidos as $pedido){
                $newPedido = new Pizza($pedido->tamano, $pedido->masa, $pedido->borde, $pedido->ingredientes, $pedido -> comentarios);

                array_push($listaPedidos, $newPedido);
            }
        }
        return $listaPedidos;
    }

    function jsonSerialize(){
        return get_object_vars($this);
    }
}
?>