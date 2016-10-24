<?php
session_start();
?>
<?php 
    $conn = mysql_connect('localhost','root','password');
    if(!$conn){
    die('No se puedeconectar'. mysql_error());
    }

    $db_selected = mysql_select_db('USUARIOS', $conn);
    if(!$db_selected){
    die('Error al seleccionar la BD'. mysql_error());
    }
    
    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];

    $sql = mysql_query("SELECT * FROM usuario WHERE usuario='".$usuario."'");
    if($dato=mysql_fetch_array($sql)){
    if($dato["password"] == SHA1("$pass")){
    $_SESSION["usuario"] = $dato['usuario'];
    $_SESSION["nombre"] = $dato['nombre'];
	 $_SESSION["correo"] = $dato['correo'];
   
   
        header('Location: usuario.php');
    }else{
    echo 'Contraseña incorrecta';
    echo '<a href="login.html">Aceptar</a>';
    }
    }else{
    echo 'Usuario no registrado';
    echo '<a href="login.html">Aceptar</a>';
    }

?>