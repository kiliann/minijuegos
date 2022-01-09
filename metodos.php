<?php
class Metodos{
    public function __construct(){
        require_once 'Conexion.php';
        $this->conexion = new Conexion();

    }

    //Este metodo es para extraer los juegos de la base de datos y mostrarlos en checkbox como las preferencias de los usuarios.
    function mostrarJuegos(){

        $consulta = "SELECT idMinijuegos, nombre FROM minijuegos WHERE 1";

        $resultado = $this->conexion->consultas($consulta);

        while ($fila = $this->conexion->extraerFila($resultado)){
           echo '<input type="checkbox" name="cbox[]" class="check-box" value="'.$fila['idMinijuegos'].'"><span>'.$fila['nombre'].'</span><br/>';
        }
    }
    //Aqui realizamos el alta de usuario
    function altaUsuario($nombre, $correo, $password, $cbox){
        $insercion = "INSERT INTO usuario( nombre, correo, contrasena) VALUES ('$nombre','$correo','$password')";
        $consulta = "SELECT correo FROM usuario WHERE correo LIKE '$correo'";
        $comprobacion = $this->conexion->consultas($consulta);
        //echo $comprobacion = $this->conexion->filasAfectadas()  ;
       //Primero comprobamos si el usuario no existe ya en la base de datos
        if ( $this->conexion->numeroFilas($comprobacion) > 0){
            echo "Este correo esta ya registrado";
        }else{
            //Aqui realizamos el alta del usuario pero no sus preferencias y si falla el alta devolvemos el numero de error
            if($this->conexion->consultas($insercion)){
                echo "Se realizo conrrectamente el registro";
            }else{
                $this->conexion->errno();
            }
        }
        //Aqui comprobamos si las preferencias no estan vacia
        if(!empty($cbox)){
            $comprobarid ="SELECT idUsuario FROM usuario WHERE correo LIKE '$correo'";
            //Extraemos el id del usuario recien registrado
            $resultado1  = $this->conexion->consultas($comprobarid);
           /* while ($fila = $this->conexion->extraerFila($resultado1)){
                $id = $fila['idUsuario'];
            }*/
            $id = $this->conexion->extraerFila($resultado1);
            $id = $id['idUsuario'];
            //Insertamos todas las preferencias selecionadas del usuario
            foreach ($_POST['cbox'] as $preferencias){

                $insercion = "INSERT INTO preferencias(idUsuario, idMinijuegos) VALUES ($id,$preferencias)";

                $this->conexion->consultas($insercion);

            }

        }

    }

}