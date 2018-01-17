<?php

function conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "prueba";

// Create connection
    $conn = new mysqli( $servername, $username, $password, $database );
// Check connection
    if ($conn->connect_error) {
        return die( "Connection failed: " . $conn->connect_error );
    } else {
        return $conn;
    }

}
