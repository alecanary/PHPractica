<?php
require_once 'ejemplos/conectar.php';
$conn = conectar1( "examenfinaljava" );
$sql = "SELECT a.nombre nombre, g.nombre grupo, a.fecha 
FROM alumnos a INNER JOIN grupos g 
on a.id_grupo= g.id ORDER BY a.id_grupo";
//$sql2 ="select floor(datediff (now(), fecha)/365) as edad from alumnos"; esta seria la consulta que devuelve la edad en sql////////////////////////////////////
$result3 = $conn->query( $sql );
$cat_anterior = "";
$cat_actual = "";
$subtotal = $total = $media = $contador = $contadorTotal = 0;

$primeravez = true;

if ($result3->num_rows > 0) {
    $rows = array();

    echo "<table class=\"table table-striped table-dark\"><thead>";
    while ($row = $result3->fetch_assoc()) {
        $rows[] = $row;


        if ($primeravez) {
            $primeravez = false;
            $cat_anterior = $row['grupo'];
            echo "<tr><td>" . $row['grupo'] . "</td><td>Fecha nacimiento</td><td>Edad media</td></tr>";
        }

        if ($row['grupo'] != $cat_anterior) {
            $cat_anterior = $row['grupo'];
            echo "<tr ><td></td><td>Media de la clase </td><td>" . $media . "</td></tr>";
            echo "<tr><td >" . $row['grupo'] . "</td><td></td><td></td></tr>";
            $total += $subtotal;
            $contadorTotal += $contador;
            $contador = 0;
            $subtotal = 0;

        }
        echo "<tr><td>" . $row['nombre'] . "</td><td>" . $row['fecha'] . "</td><td>" . busca_edad( $row['fecha'] ) . "</td></tr>";
        $subtotal += busca_edad( $row['fecha'] );
        $contador++;
        $media = $subtotal / $contador;


    }
    echo "<tr ><td></td><td> subtotal </td><td>" . $media . "</td></tr>";
    $total += $subtotal;
    $contadorTotal += $contador;
    $mediaTotal = (int)($total / $contadorTotal);
    echo "<tr class='bg-info'><td></td><td> Media total </td><td>" . $mediaTotal . "</td></tr>";


    echo "</tbody></table>";
} else {
    echo "0 results";
}


$conn->close();
function busca_edad($fecha_nacimiento)
{
    $dia = date( "d" );
    $mes = date( "m" );
    $ano = date( "Y" );


    $dianaz = date( "d", strtotime( $fecha_nacimiento ) );
    $mesnaz = date( "m", strtotime( $fecha_nacimiento ) );
    $anonaz = date( "Y", strtotime( $fecha_nacimiento ) );


//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

    if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano = ($ano - 1);
    }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

    if ($mesnaz > $mes) {
        $ano = ($ano - 1);
    }

    //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

    $edad = ($ano - $anonaz);


    return $edad;


}


