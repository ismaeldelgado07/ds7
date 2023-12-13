<?php 
require_once("../class/sumatorias.php");

$oSumatoriasConsultarRegistros = new sumatorias();
$oSumatoriasConsultarRegistros = $oSumatoriasConsultarRegistros->consultar_registros();

$numero = $_POST['numero'];
$resultado = 1;
$factorialfinal;
$sumatoriafinal;

echo "<center>";
echo "<h1>Resultados</h1>";
echo '<br><br>';

function calcularFactorial($n) {
    return ($n == 0 || $n == 1) ? 1 : $n * calcularFactorial($n - 1);
}

// Función para calcular la sumatoria
function calcularSumatoria($n) {
    $sumatoria = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sumatoria += $i;
    }
    return $sumatoria;
}

$factorialfinal = calcularFactorial($numero);
$sumatoriafinal = calcularSumatoria($numero);

echo " El factorial del numero es: ". $factorialfinal . "<br>";
echo " La sumatoria del número es: ". $sumatoriafinal . "<br>";

$oSumatoriasInsertar = new sumatorias(); 
$oSumatoriasInsertar = $oSumatoriasInsertar->insertar_registro($factorialfinal, $numero, $sumatoriafinal);

echo '<br>';
echo 'Historial';

if (!empty($oSumatoriasConsultarRegistros)) {
    echo "<TABLE>\n";
    echo "<TR>\n";
    echo "<TH> Id </TH>\n";
    echo "<TH> N </TH>\n";
    echo "<TH> Factorial </TH>\n";
    echo "<TH> Sumatoria </TH>\n";
    echo "</TR>\n";

    foreach ($oSumatoriasConsultarRegistros as $registro) {
        echo "<TR>\n";
        echo "<TD>" . $registro['id']. "</TD>\n";
        echo "<TD>" . $registro['N']. "</TD>\n";
        echo "<TD>" . $registro['Factorial']. "</TD>\n";
        echo "<TD>" . $registro['Sumatoria']. "</TD>\n";
        echo "</TR>";
    }

    echo "</TABLE>\n";
} else {
    print("No hay registros disponibles");
}

echo "</center>";
?>
