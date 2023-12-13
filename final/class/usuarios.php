<?php
    require_once('model.php');

    class usuarios extends modeloCredencialesBD{
        protected $userId;
        protected $nombre;
        protected $apellido;
        protected $email;
        protected $fecha_registro;
    
        public function __construct(){
            parent:: __construct();
            
        }

        public function validar_usuario($usr,$pwd){
            $instruccion = "CALL sp_validar_usuario('".$usr."', '".$pwd."')";

            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all (MYSQLI_ASSOC);

            if ($resultado){

                return $resultado;
                $resultado->close();
                $this->_db->close();
            }

        }
    }
?>