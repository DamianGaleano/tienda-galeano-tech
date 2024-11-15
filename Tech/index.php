<?php

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "tech";

    $coneccion = mysqli_connect ($servidor, $usuario, $clave, $bd )

?>
<?php  
$servername = "localhost"; // Cambiar si tu servidor es diferente  
$username = "root";   // Tu nombre de usuario de la base de datos  
$password = ""; // Tu contraseña de la base de datos  
$database = "tech"; // Nombre de tu base de datos  

// Crear conexión  
$conn = new mysqli($servername, $username, $password, $database);  

// Verificar conexión  
if ($conn->connect_error) {  
    die("Conexión fallida: " . $conn->connect_error);  
}  
echo "Conectado exitosamente";  

// Aquí puedes agregar código para insertar los datos del formulario  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $nombre = $_POST['Nombre'];  
    $apellido = $_POST['Apellido'];  
    $dni = $_POST['Dni'];  
    $correo = $_POST['Correo'];  
    $formaDePago = $_POST['FormaDePago'];  
    $envio = $_POST['Envio'];  
    $Domicilio = $_POST['Domicilio'];  // cómo agregar una fila en la tabla "https://www.youtube.com/watch?v=hb6p2QdyTuo"
    $carrito = $_POST['carrito']; 
    $sql = "INSERT INTO Formpagos (Nombre, Apellido, Dni, Correo, FormaDePago, Envio, Domicilio, carrito) VALUES ('$nombre', '$apellido', $dni, '$correo', '$formaDePago', '$envio', '$Domicilio', '$carrito')";  

    if ($conn->query($sql) === TRUE) {  
        echo "Registro guardado exitosamente";  
    } else {  
        echo "Error: " . $sql . "<br>" . $conn->error;  
    }  


     // Datos del correo para el administrador  
     $to_admin = 'https://formsubmit.co/pasitosgamingagustin@gmail.com'; // Cambia esto por la dirección de tu administrador  
     $subject_admin = 'Nueva compra registrada';  
     $message_admin = "Nombre: $name\nApellido: $Apellido\nDni: $Dni\nCorreo: $Correo\nFormaDePago: $FormaDePago\n\nEnvio\n$Envio\nDomicilio: $Domicilio\n\carrito: $carrito";  
     mail($to_admin, $subject_admin, $message_admin);  
 
     // Datos del correo para el cliente  
     $subject_client = 'Confirmación de compra';  
     $message_client = "Gracias por tu compra, $name.\n\nAquí están los detalles de tu compra:\n$Envio";  
     mail($Correo, $subject_client, $message_client);  

     // Redirigir a una página de confirmación  
     header('Location: gracias.html'); // Cambia esto a tu página de gracias  
     exit();  
}  

// Cerrar conexión  
$conn->close();  
?>