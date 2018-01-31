<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->

<?php
require_once 'ejemplos/conectar.php';
$conn = conectar();
$cont = 0;
$sql = "select * from books ORDER BY category_id";


//$sql = "show databases; ";
$result = $conn->query( $sql );

if ($result->num_rows > 0) {

    echo "<table class=\"table table-striped table-dark\"><thead>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr >";
        foreach ($row as $k => $v) {
            if ($cont == 0) {
                $cont++;
                foreach ($row as $k1 => $v1)
                    echo "<th  scope=\"col\">" . $k1 . "</th>";
                echo "</tr></thead><tbody><tr>";
            }
            echo "<td >" . $v . "</td>";
        }
        echo "<td><a href='index.php'>+</a></td><td><a href='index.php'>Borrar</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}

$result->free();
$conn->close();

////////////////////////////////////////////////////////////////////////////////////////////
$conn = conectar();
$sql1 = "SELECT c.category_name cat, b.title titulo, b.price precio 
FROM books b INNER JOIN categories c 
on b.category_id= c.category_id ORDER BY b.category_id";

$result = $conn->query( $sql1 );

if ($result->num_rows > 0) {
    $cat_anterior = "";
    $cat_actual = "";
    $subtotal = 0;
    $total = 0;
    $primeravez = true;
    $rows = array();

    echo "<table class=\"table table-striped table-dark\"><thead>";
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
        if ($primeravez) {
            $primeravez = false;
            $cat_anterior = $row['cat'];
            echo "<tr><td>" . $row['cat'] . "</td><td></td><td></td></tr>";
        }

        if ($row['cat'] != $cat_anterior) {
            $cat_anterior = $row['cat'];
            echo "<tr ><td>subtotal </td><td>" . $subtotal . "</td><td></td></tr>";
            echo "<tr><td >" . $row['cat'] . "</td><td></td><td></td></tr>";
            $total += $subtotal;
            $subtotal = 0;

        }
        echo "<tr><td></td><td>" . $row['titulo'] . "</td><td>" . $row['precio'] . "</td></tr>";
        $subtotal += (float)$row['precio'];

    }
    echo "<tr ><td> subtotal </td><td>" . $subtotal . "</td><td></td></tr>";
    $total += $subtotal;
    echo "<tr class='bg-info'><td> total </td><td>" . $total . "</td><td></td></tr>";


    echo "</tbody></table>";
} else {
    echo "0 results";
}


$conn->close();