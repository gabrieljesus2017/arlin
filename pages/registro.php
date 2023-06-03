<?php
    // conexión con la base de datos y el servidor
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "clientes_potenciales";
    $conexion = new mysqli($server, $user, $pass, $db);
    if ($conexion->connect_errno) {
        die("La conexión ha fallado: " . $conexion->connect_error);
    }

    // obtenemos los valores del formulario
    $nombres = $_POST['inputEmail4'];
    $email = $_POST['inputPassword4'];
    $servicio = $_POST['inputServicios'];
    $direccion = $_POST['inputAddress2'];
    $departamento = $_POST['inputZip1'];
    $ciudad = $_POST['inputCity'];
    $telefono = $_POST['inputPhone'];

    // verifica que se hayan llenado todos los campos
    $req = (strlen($nombres)*strlen($email)*strlen($servicio)*strlen($direccion)*strlen($departamento)*strlen($ciudad)*strlen($telefono)) or die("No se han llenado todos los campos");

    // ingresamos la información a la base de datos
    $query =   "INSERT INTO clientes(nombres,email,servicio,direccion,departamento,ciudad,telefono)
                VALUES('$nombres', '$email', '$servicio', '$direccion', '$departamento', '$ciudad', '$telefono')";
    if ($conexion->query($query) === true) {
        echo '
        <script>
            alert("Registro Exitoso");
            location.href="contacto.html";
        </script>
        ';
    } else {
        echo "Error guardando los datos: " . $conexion->error;
    }

    // cerrar la conexión
    $conexion->close();
?>
