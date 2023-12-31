<?php 
    require_once('model.php');

    class properties extends modeloCredencialesBD{
        protected $propiedadID;
        protected $titulo;
        protected $descripcion;
        protected $tipoPropiedad;
        protected $precio;
        protected $dormitorios;
        protected $baños;
        protected $tamaño;
        protected $ubicacion;
        protected $imagen;
        protected $fechapublicacion;
        protected $disponible;
        protected $nombrePropiedad;
        protected $provincia;
        protected $barrio;
        protected $fechaConstruccion;
        protected $ciudad;
        protected $mantenimiento;
        protected $coordenada_x;
        protected $coordenada_y;
        protected $imagenprincipal;
        protected $tipoimagen1;
        protected $rutaimagen1;
        protected $imagensecundaria;
        protected $tipoimagen2;
        protected $rutaimagen2;

        public function __construct(){
            parent::__construct();
        }

        public function consultar_propiedades(){
            $instruccion = "CALL sp_consultar_todas_las_propiedades()";
            
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

                if(!$resultado){
                    echo "Fallo al consultar las propiedades";
                }
                else{
                    return $resultado;
                    $resultado->close();
                    $this->_db->close();
                }
        }

        public function consultar_propiedad($campo){
            $instruccion = "CALL sp_consultar_propiedad('". $campo ."')";

            $consulta=$this->_db->query($instruccion);
            $resultado = $consulta-> fetch_all(MYSQLI_ASSOC);

            if($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function busqueda_avanzada($keyword,$province,$location,$propertie_Type,$min_price,$max_price,$constructionYear,$size){
            
            $sql = "CALL sp_busqueda_avanzada('$keyword', '$province', '$location', '$propertie_Type', '$min_price', '$max_price', '$constructionYear', '$size')";

            // Ejecutar la consulta
            $consulta = $this->_db->query($sql);
        
            // Manejar el resultado de la consulta según sea necesario
            if ($consulta) {
                $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
                $consulta->close();
                $this->_db->close();
                return $resultado;
            } else {
                echo "Error en la consulta: " . $this->_db->error;
                return false;
            }
        }
    }

?>