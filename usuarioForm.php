<?php
    require_once("classes/Usuario.class.php");

    $user = new Usuario();

    $userList = $user -> cargarUsers();

    //var_dump($userList);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alta de Usuario</title>
</head>
<body>
    <header>
        <h1>Alta de Usuario</h1>
    </header>
    <section>
        <form method="POST" action="altaUsuario.php">
            <label for="nom">Nombre:</label>
            <input type="text" name="nom" id="nom" placeholder="Nombre" title="Escriba Solamente su nombre" required pattern="^[a-zA-Z]{1,15}$">
            <br>
            <label for="apat">Apellido Paterno:</label>
            <input type="text" name="apat" id="apat" placeholder="Apellido Paterno" title="Escriba su Apellido Paterno" required>
            <br>
            <label for="amat">Apellido Materno:</label>
            <input type="text" name="amat" id="amat" placeholder="Apellido Materno" title="Escriba su Apellido Materno" required>
            <br>
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user" placeholder="Usuario" title="Escriba su Usuario" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Correo Electronico" title="Escriba su Correo Electronico" required>
            <br>
            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" id="pass" placeholder="Contraseña" title="Escriba su Contraseña" required>
            <br>
            <input type="submit" name="ok" id="ok" value="Enviar">
            <input type="reset" name="rst" id="rst" value="Limpiar">
        </form>
        <br><br>
        <h3>Lista de Usuarios</h3>
        <?php
            if(count($userList) > 0){
                //desplejar tabla con info
                echo '<table border="1" width="1024" cellpadding="5" cellspacing="5">';
                echo '<tr>';
                echo '<th>NOMBRE</th>';
                echo '<th>A.PATERNO</th>';
                echo '<th>A.MATERNO</th>';
                echo '<th>USUARIO</th>';
                echo '<th>E-MAIL</th>';
                echo '<th>PASSWORD</th>';
                echo '</tr>';
                foreach($userList as $user){
                    $user->mostrarUser();
                }
                echo "</table>";
            }
            else{
                echo "<p>No hay Usuarios en la lista</p>";
            }
        ?>
    </section>
    <footer>
        <p>Derechos Reservados 2024 &copy;</p>
    </footer>
</body>
</html>