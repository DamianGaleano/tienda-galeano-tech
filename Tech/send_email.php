<?php

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "Tech";

    $coneccion = mysqli_connect ($servidor, $usuario, $clave, $bd )
    ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $name = htmlspecialchars($_POST['name']);  
    $email = htmlspecialchars($_POST['email']);  
    $phone = htmlspecialchars($_POST['phone']);  
    $details = htmlspecialchars($_POST['details']);  

    // Datos del correo para el administrador  
    $to_admin = 'galeanodamian321@gmail.com'; // Cambia esto por la dirección de tu administrador  
    $subject_admin = 'Nueva compra registrada';  
    $message_admin = "Nombre: $name\nEmail: $email\nTeléfono: $phone\n\nDetalles de Compra:\n$details";  
    mail($to_admin, $subject_admin, $message_admin);  

    // Datos del correo para el cliente  
    $subject_client = 'Confirmación de compra';  
    $message_client = "Gracias por tu compra, $name.\n\nAquí están los detalles de tu compra:\n$details";  
    mail($email, $subject_client, $message_client);  

    // Redirigir a una página de confirmación  
    header('Location: gracias.html'); // Cambia esto a tu página de gracias  
    exit();  
}  
?>



<!-- 

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "ejemplo";

    $coneccion = mysqli_connect ($servidor, $usuario, $clave, $bd )

?>


<form method="post">

<input type="text" name="nombre" placeholder="nombre">
<input type="text" name="correo" placeholder="correo">
<input type="text" name="telefono" placeholder="telefono">
    
<input type= "submit" name="enviar">

</form>



  if(isset($_POST['enviar'])){
      
      $nombre = $_POST['nombre'];
      $correo = $_POST['correo'];
      $telefono = $_POST['telefono'];
      
      $insertar = "INSERT INTO datos Values ('$nombre','$correo','$telefono','')";
      
      $coneccion = mysqli_query($coneccion,$insertar);
  }
?>  -->
