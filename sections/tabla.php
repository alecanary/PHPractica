<style>
    table, th, td {
        /*border: 1px solid black;*/
    }
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php
require_once 'ejemplos/conectar.php';
$conn = conectar();
$cont = 0;
$sql = "SELECT * FROM books";
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
$conn->close();