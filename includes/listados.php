<?php
//abrir fichero, que esta ordenado por un campos que se puede repetir...

function pruebaFichero($fich)
{
    if (!file_exists( $fich )) {
        echo "Fichero no encontrado: " . $fich;
        die( $fich );
    }
    $file = fopen( $fich, "r" );

    while (!feof( $file )) {
        echo fgets( $file ) . "<br />";
    }

    fclose( $file );
}


function leerOrdenadoC1($rutaFichero)
{
    if (!file_exists( $rutaFichero )) {
        echo "Fichero no encontrado: " . $rutaFichero;
        die( $rutaFichero );
    }
    //abrir el fichero
    $fich_desc = fopen( $rutaFichero, "r" );
    $c1_total = 0;
    $c1_subtotal = 0;
    $registro = fgets( $fich_desc );//lectura del primer registro
    // $c1 = explode( "#", $registro )[0];
    //$c1_ant = $c1;

    while (!feof( $fich_desc )) {
        $c1 = explode( "#", $registro )[0];
        $c1_ant = $c1;
        while (!feof( $fich_desc ) && $c1 == $c1_ant) {
            echo $registro . "</br>";
//            $c1_valor= (int)explode( "#", $registro )[1];
//            echo $c1_valor."</br>";
            //$c1 = explode( "#", $registro )[0];
            $c1_subtotal += (int)explode( "#", $registro )[1];
            $registro = fgets( $fich_desc );//leer siguiente
            $c1 = explode( "#", $registro )[0]; //es necesario hacer esto despues del fgets para que la comparacion sea valida.

        }
        $c1_total += $c1_subtotal;
        echo "El total de " . $c1_ant . " es " . $c1_subtotal . "</br>";
        $c1_subtotal = 0;
    }
    echo "La suma total es " . $c1_total;
    fclose( $fich_desc );
}
