<?php
    require_once("classes/pizza.class.php");

    $pedido = new Pizza();

    $listaPedidos = $pedido -> cargarPedidos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Pizza</title>
</head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<body background="../imgs/Screenshot 2024-05-20 020547.png"; style="background-attachment:fixed">
    <div class="row mb-5"; style="background-color:#c84205; text-align: center;">
    <h1 style="color:#faf9eb"><strong>¡Haz tu pedido de pizza!</strong></h1>
    </div>
    <div class="container" style="background-color:#e1b5a1e1; border-radius: 10px;">
    <form method="post" action="alta.php">
        <br>
        <div class="row" style="background-color:#b2889ca6">
        <div class="col-4 mt-2 mb-2" style="text-align:center">
        <label for="tamano" style="color:white">Tamaño:</label>
        <select name="tamano" id="tamano">
            <option value="Pequeña">Pequeña</option>
            <option value="Mediana">Mediana</option>
            <option value="Grande">Grande</option>
        </select>
    </div>
        <br>
        <div class="col-4 mt-2 mb-2" style="text-align:center">
        <label for="masa" style="color:white">Tipo de masa:</label>
        <select name="masa" id="masa">
            <option value="Delgada">Delgada</option>
            <option value="Normal">Normal</option>
            <option value="Gruesa">Gruesa</option>
        </select>
    </div>
        <br>
        <div class="col-4 mt-2 mb-2" style="text-align:center">
        <label for="borde" style="color:white">Tipo de borde:</label>
        <select name="borde" id="borde">
            <option value="Tradicional">Tradicional</option>
            <option value="Orilla Queso">Orilla de queso</option>
            <option value="Crunchy">Crunchy</option>
        </select>
    </div>
</div>
        <br>
        <div class="container" style="background-color:#aaaaaeaa; border-radius:4px">
        <p style="color:white; font-size:20px;"><strong>Ingredientes:</strong></p>
        <input type="checkbox" name="ingredientes[]" id="queso" value="Queso" checked>
        <label for="queso">Queso</label>
        <br>
        <input type="checkbox" name="ingredientes[]" id="pepperoni" value="Pepperoni">
        <label for="pepperoni" style="color:white">Pepperoni</label>
        <br>
        <input type="checkbox" name="ingredientes[]" id="jamon" value="Jamon">
        <label for="jamon" style="color:white">Jamón</label>
        <br>
        <input type="checkbox" name="ingredientes[]" id="champinones" value="Champiñones">
        <label for="champinones" style="color:white">Champiñones</label>
        <br>
        <input type="checkbox" name="ingredientes[]" id="aceitunas" value="Aceitunas">
        <label for="aceitunas" style="color:white">Aceitunas</label>
        </div>
        <br>
        <br>
        <label for="comentarios" style="color:white; font-size:20px;"><strong>Comentarios adicionales:</strong></label>
        <br>
        <textarea name="comentarios" id="comentarios" rows="4" cols="40" class="form-control"></textarea><br>
        <br>
        <div class="container">
        <input type="submit" value="Enviar Pedido" class="btn btn-danger btn-outline-light mb-3" name="submit">
        <input type="reset" value="Restaurar Pedido" class="btn btn-secondary btn-outline-dark mb-3">
    </div>
    </form>
</div>
<br><br>
    <h3>Lista de Pedidos</h3>
    <?php
        if(count($listaPedidos) > 0){
            //desplejar tabla con info
            echo '<table border="1" width="1024" cellpadding="5" cellspacing="5">';
            echo '<tr>';
            echo '<th>#Pedido</th>';
            echo '<th>Tamaño</th>';
            echo '<th>Tipo de masa</th>';
            echo '<th>Tipo de Borde</th>';
            echo '<th>Ingredientes</th>';
            echo '<th>Comentarios</th>';
            echo '</tr>';
            foreach($listaPedidos as $pedido){
                $pedido->mostrarPedidos();
            }
            echo "</table>";
            }
            else{
                echo "<p>No hay Pedidos en la lista</p>";
            }
        ?>
</body>
</html>