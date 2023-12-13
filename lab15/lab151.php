<HTML LANG="es">
<head>
    <title>
        Ejemplo de DataTable JQuery
    </title>
    <link REL ="stylesheet" type="text/css" HREF="jquery.dataTables.min.css">
    <script type='text/javascript' language="javascript" scr="jquery-3.1.js"></script>
    <script type='text/javascript' language="javascript" scr="jquery-dataTables.min.js"></script>
</head>

<body>
    <script>
        $(document).ready(function(){
            $('#grid').dataTable({
                "lengtMenu":[5,10,20,50],
                "order":[[0,asc]],
                "language":{
                    "lenghtMenu": "Mostrar _MENU_ registro por pagina",
                    "zeroRecords": "No existe resultados en su búsqueda",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Buscando entre _MAX_ resgitros en total)",
                    "search": "Buscar:",
                    "paginate":{
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior",
                    },
                }
            })
            $("*").css("font-family","arial").css('font-size', '12px');
        });
     
    </script>
    <h1>
        Consulta de noticias
    </h1>
    <?php
    require_once("class/noticias.php");

    $obj_noticia = new noticia();
    $noticias = $obj_noticia->consultar_noticias();

    $nfilas = count ($noticias);

    if ($nfilas> 0){
        print ("<TABLE id='grid'class='display' cellspaceing='0' >\n");
        print ("<THEAD>\n");
        print ("<TR>\n");
        print ("<TH> Titulo </TH>\n");
        print ("<TH> Texto </TH>\n");
        print ("<TH> Categorias </TH>\n");
        print ("<TH> Fecha </TH>\n");
        print ("<TH> Imagen </TH>\n");
        print ("</TR>\n");
        print ("<THEAD>");
        print ("<TBODY>");

        foreach ($noticias as $resultado){
            print ("<TR>\n");
            print ("<TD>" . $resultado['titulo']. "</TD>\n");
            print ("<TD>" . $resultado['texto']. "</TD>\n");
            print ("<TD>" . $resultado['categoria']. "</TD>\n");
            print ("<TD>" .date("j/n/Y",strtotime($resultado['fecha'])). "</TD>\n");


            if ($resultado['imagen'] != ""){
                print ("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] . "'><IMG BORDER='0' SRC = 'img/iconotexto.gif'></A></TD>\n");
            }
            else{
                print ("<TD>&nbsp;</TD>");
            }
            print ("</TR>");
            print ("</TBODY>");
        }
        print ("</TABLE>\n");

    }
    else{
        print ("No hay noticias disponibles");
    }

    
    ?>
</body>

</HTML>