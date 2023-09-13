<?php
   $nombreArchivo = $_FILES['nombre_archivo_cliente']['name'];
  
   if(isset($_FILES['nombre_archivo_cliente'])){
    $size=$_FILES['nombre_archivo_cliente']['size'];
    $filetype=$_FILES['nombre_archivo_cliente']['type'];
    echo "<center>";
    echo " Tipo de archivo: " . $filetype .". <br>";
    echo " Tamaño del archivo: " . $size ." Kylobytes. <br>";
  
        if($filetype!="image/jpeg" || $filetype!="image/jpg" || $filetype!="image/gif" || $filetype!="image/png" ){
            echo "El formato del archivo no es válido."; 
        }
        else{
            if($size>7682181){
                echo "El archivo es muy grande para subir al servidor"; 
                }
                else{
                    if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])){
                        $nombreDirectorio = "archivos/";
                        
                        $nombreCompleto = $nombreDirectorio . $nombreArchivo;
                        if(is_file($nombreCompleto)){
                            $idUnico = time();
                            $nombrearchivo = $idUnico . "-" . $nombreArchivo;
                                echo "Archivo repetido, se cambiara el nombre a $nombrearchivo <br><br>";
                        }
    
                        move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'],
                        $nombreDirectorio . $nombreArchivo);
    
                        echo "El archivo se ha subido satisfactoriamente al directorio 
                        $nombreDirectorio <br>";
                    }
                    else{
                        echo "No se ha podido subir el archivo <br>";
                    }
                }
        }
              
    }
    echo "</center>";
?>