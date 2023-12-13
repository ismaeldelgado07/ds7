<?php 
    require_once('model.php');

    class sumatorias extends modeloCredencialesBD{
        protected $id;
        protected $N;
        protected $Factorial;
        protected $Sumatoria;

        public function __construct(){
            parent::__construct();
        }

        public function consultar_registros(){
            $instruccion = "CALL sp_listar_registros()";
            
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

                if(!$resultado){
                    echo "<center>Fallo al consultar los registros</center>";
                }
                else{
                    return $resultado;
                    $resultado->close();
                    $this->_db->close();
                }
        }

        public function insertar_registro($f, $n, $s){
            $instruccion = "CALL sp_insertar_registro('". $f . "','" . $n ."','"  . $s . "')";
        
            $consulta = $this->_db->query($instruccion);
        
            if ($consulta) {
                $this->_db->close();
                return true;
            } else {
                echo "<center>Fallo al insertar el registro: " . $this->_db->error . "</center>";
                return false;
            }
        }
        

    }

?>