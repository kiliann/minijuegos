<?php
class Metodos{
    public function __construct(){
        require_once 'Conexion.php';
        $this->conexion = new Conexion();

    }


    function mostrarJuegos(){

        $consulta = "SELECT idMinijuegos, nombre FROM minijuegos WHERE 1";

        $resultado = $this->conexion->consultas($consulta);

        while ($fila = $this->conexion->extraerFila($resultado)){
           echo '<label><input type="checkbox" class="cbox1" value="'.$fila['idMinijuegos'].'">'.$fila['nombre'].'</label><br>';
        }
    }

    function altaUsuario($nombre, $correo, $password){
        $insercion = "INSERT INTO usuario( nombre, correo, contrasena) VALUES ('$nombre','$correo','$password')";

        if($this->conexion->consultas($insercion)){
            echo "Se realizo conrrectamente el registro";
        }else{
            $this->conexion->errno();
        }
    }

}