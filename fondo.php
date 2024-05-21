<?php
    $colores = ["#FF0000","#00FF00","#0000FF"];
    $color = $colores[rand(0,2)];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fondo PHP</title>
    </head>
    <body bgcolor=<?php echo $color; ?>>
        <h1>Fondo PHP</h1>
        <p>Este es un ejemplo de carga dinamica del
        fondo usando PHP.</p>
    </body>
</html>