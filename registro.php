<?php
require_once 'Metodos.php';
$metodos = new Metodos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
<h1>Resgistro</h1>
<?php if(!isset($_POST['enviar'])){ ?>
<div>
    <form action="registro.php" method="post">
        <label>Nombre</label>
        <input name="nombre" type="text" placeholder="Nombre"><br/>
        <label> Correo </label>
        <input name="correo" type="text" placeholder="Correo Electronico"><br/>
        <label>Contraseña</label>
        <input name="password" type="password" placeholder="Contraseña"><br/>
        <label>Repita la Contraseña</label>
        <input name="rpassword" type="password" placeholder="Contraseña"><br/>
        <label>Videojuego que prefieres</label><br/>
        <?php
        $metodos->mostrarJuegos();
        ?>
        <input name="enviar" type="submit" value="Enviar">

    </form>
</div>
<?php
}else{


}?>
</body>
</html>