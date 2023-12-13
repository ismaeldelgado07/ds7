<?php
    class usuariosMDB{
        private $mongo_client;
        private $mongo_host;
        private $mongo_user;
        private $mongo_pswd;
        private $mongo_database;
        private $mongo_collection;
        private $mongo_document;

        function __construct(){
            $this->mongo_host = "localhost:27017";
            $this->mongo_user = "";
            $this->mongo_pswd= "";
            $this->mongo_database= "";
            $this->mongo_collection= "";
            $this->conectarMongodb();
        }

        public function conectarMongodb(){
            try{
                $this->mongo_client = new MongoDB\Driver\Manager("mongodb://" . $this->mongo_host);
            }catch(Exception $e){
                die("Ocurrio la siguiente exception al tratar conectarse a la base de datos: " .$e->getMessage());
            }
        }

        public function insertarRegistro ($nombre,$apellido,$email,$edad){
            try{
                $this->mongo_document = new MongoDB\Driver\BulkWrite;

                $doc = ['_id' => new Mongo\BSON\ObjectId, 'nombre'=>"$nombre",'apellido'=>"$apellido",'email'=>"$email",'edad'=>intval($edad)];
                $this->mongo_document->inser($doc);

                $this->mongo_client->executeBulkWrite ($this->mongo_database.'.'.$this->mongo_collection,$this->mongo_document);
            }catch(MongoDB\Driver\Exception\Exception $e){
                echo "Ocurrio la siguiente excepcion al tratar de guardar el registro: ", $e->getMessage(), "\n" ;
            }
        }

        public function obtenerRegistros(){
            try{
                $query = new MongoDB\Driver\Query([]);
                $rows = $this->mongo_client-> executeQuery ($this->mongo_database.'.'.$this->mongo_collection, $query);
                
                foreach ($rows as $row){
                    echo "ID: $row->_id - Nombre Completo: $row->nombre $row->apellido - E-mail: $row->E-mail - Edad: $row ->edad <br>";
                }

            }catch(MongoDB\Driver\Exception\Exception $e){
                echo "Ocurrio la siguiente excepcion al tratar de guardar el registro: ", $e->getMessage(), "\n" ;
            }
        }
    }

?>