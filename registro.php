<?php 
    $conn = mysql_connect('localhost','root','gcc');
    if(!$conn){
    die('No se puedeconectar'. mysql_error());
    }

    $db_selected = mysql_select_db('login', $conn);
    if(!$db_selected){
    die('Error al seleccionar la BD'. mysql_error());
    }

    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    $pass1 = $_POST['password1'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    if(in_array($_FILES['imagen']['type'], $permitidos)){
    $rutaEnServidor='imagenes';
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $nombreImagen = $_FILES['imagen']['name'];
    $rutaDestino = $rutaEnServidor.'/'.$nombreImagen;
    move_uploaded_file($rutaTemporal, $rutaDestino);
        
        if($pass!=$pass1){
        echo "Las contraseñas no coinciden";
        }else{
        $ins = "INSERT INTO usuario(usuario, password, nombre, correo, foto_perfil) VALUES ('".$usuario."', SHA1('".$pass."'), '".$nombre."', '".$correo."', '".$rutaDestino."') ";
            $ins2=mysql_query($ins, $conn) or die(mysql_error());
            
            ob_start();
            echo 'Te has registrado correctamente';
            header("refresh: 3; url=index.html");
            ob_end_flush();
        }
        
    }
?>