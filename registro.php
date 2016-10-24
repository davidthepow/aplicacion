<?php 
    $conn = mysql_connect('localhost','root','password');
    if(!$conn){
    die('No se puedeconectar'. mysql_error());
    }

    $db_selected = mysql_select_db('USUARIOS', $conn);
    if(!$db_selected){
    die('Error al seleccionar la BD'. mysql_error());
    }

    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    $pass1 = $_POST['password1'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

   
        
        if($pass!=$pass1){
        echo "Las contraseñas no coinciden";
        }else{
        $ins = "INSERT INTO USUARIOS(usuario, password, nombre, correo) VALUES ('"$
            $ins2=mysql_query($ins, $conn) or die(mysql_error());
            
            ob_start();
            echo 'Te has registrado correctamente';
            header("refresh: 3; url=index.html");
            ob_end_flush();
        }
        
    }
?>