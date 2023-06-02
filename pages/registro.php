<?php
	//conexion con la base de datos y el servidor
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "clientes potenciales";
    $conexion = new mysqli($server,$user,$pass,$db);
    if($conexion->connect_errno) {
         die("la conexion ha fallado" . $conexion->connect_errno

    );
    }
 	//$link = mysql_connect("localhost","root","","clientes") or die("<h2>No se encuentra el servidor</h2>");
	//$db = mysql_select_db("clientes",$link) or die("<h2>Error de Conexion</h2>");

	//obtenemos los valores del formulario
	$nombres = $_POST['inputEmail4'];
	$email = $_POST['inputPassword4'];
	$servicio = $_POST['inputServicios'];
	$direccion = $_POST['inputAddress2'];
	$departamento = $_POST['inputZip1'];
    $cuidad = $_POST['inputCity'];
    $telefono = $_POST['inputPhone'];

	//Obtiene la longitus de un string
	$req = (strlen($nombres)*strlen($email)*strlen($servicio)*strlen($direccion)*strlen($departamento)*strlen($cuidad)*strlen($telefono)) or die("No se han llenado todos los campos");

	

	//ingresamos la informacion a la base de datos
	mysql_query("INSERT INTO clientes  VALUES('','$nombres','$email','$servicio','$direccion','$departamento','$cuidad','$telefono')",$link) or die("<h2>Error Guardando los datos</h2>");
	echo'
		<script>
			alert("Registro Exitoso");
			location.href="contacto.html";
		</script>
        '
        ?>