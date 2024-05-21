<?php

class Usuario implements JsonSerializable{

    //atributos
    private $nom;
    private $apat;
    private $amat;
    private $user;
    private $email;
    private $pass;

    //constructor
    function __construct($nombre="", $paterno="", $materno="", $usuario="", $correo="", $clave=""){
        $this -> nom = $nombre;
        $this -> apat = $paterno;
        $this -> amat = $materno;
        $this -> user = $usuario;
        $this -> email = $correo;
        $this -> pass = $clave;
    }

    //metodos
    function mostrarUser(){
        echo '<tr>';
        echo '<td>'. $this->nom .'</td>';
        echo "<td>$this->apat</td>";
        echo "<td>$this->amat</td>";
        echo "<td>$this->user</td>";
        echo "<td>$this->email</td>";
        echo "<td>$this->pass</td>";
        echo '</tr>';
    }

    //Guardar el usuario capturado dentro del archivo de usuarios json.
    function saveOnFile(){
        //codificar objeto en JSON
        $jsonUser = json_encode($this,
        JSON_UNESCAPED_UNICODE |
        JSON_PRETTY_PRINT |
        JSON_NUMERIC_CHECK);

        //Designar nombre del archivo
        $filename = __DIR__ . "/../users.json";

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

    function cargarUsers(){
        $userList = array();
        $filename = __DIR__ . "/../users.json";

        if(file_exists($filename)){
            $json = file_get_contents($filename);

            $users = json_decode($json,false);

            //var_dump($users);
            foreach($users as $user){
                $newUsu = new Usuario($user->nom, $user->apat, $user->amat, $user->user, $user -> email, $user->pass);

                array_push($userList, $newUsu);
            }
        }
        return $userList;
    }

    //Convierte el objeto en JSON
    function jsonSerialize(){
        return get_object_vars($this);
    }
}
?>