<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING); 
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //echo "$usuario . $password . $password2";

    $errores = "";

    if (empty($usuario) or empty($password) or empty($password2)) {
        $errores .= "<li>Porfavor rellena los campos</li>";
    }else{
        try{
    $conexion = new PDO('mysql:host=localhost;dbname=loginpractica', 'root','');
    }catch (PDOException $e){
        echo "error:" . $e->getMessage();
        die();
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
    $statement->execute(array(':usuario' => $usuario)); //comproamos si no exite l nombe
    $resultado = $statement->fetch();

    if ($resultado != false) {
        $errores .= "<li>el nombre de usuario ya existe</li>";
    }

    $password = hash('sha512', $password);  //encriptamos las contraseñas
    $password2 = hash('sha512', $password2);
    //echo "$usuario . $password . $password2";
   
    if ($password != $password2) {  //comprovamos si son iguales la contraseña
        $errores .= "<li>Las contraseñas no son iguales</li>";
    }

    }

    if ($errores == "") {  //agregamos datos ala base de datos
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statement->execute(array
            (':usuario' => $usuario,
             ':pass' => $password
        ));

        header('Location: login.php');
    }



}




require 'views/registrate.view.php';

?>