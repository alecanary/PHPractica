<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<?php
require_once 'ejemplos/conectar.php';
$conn = conectar();
$cont=0;
$sql = "SELECT * FROM productos";
$result = $conn->query( $sql );

if ($result->num_rows > 0) {

    echo " </br><table><thead><tr>";

while ($row = $result->fetch_assoc()){
    foreach ($row as $k=>$v){
        if($cont==0){
            $cont++;
            foreach ($row as $k1=>$v1)
                echo"<th>".$k1."</th>";
            echo "</thead></tr>";
        }
            echo "<td>".$v."</td>";





        // var_dump($v);
    }

    echo "</tr>";
}

    echo "</table>";
       }

 else {
    echo "0 results";
}
$conn->close();