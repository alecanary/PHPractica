<?php

function conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "eshop";

// Create connection
    $conn = new mysqli( $servername, $username, $password, $database );
    //$conn = new mysqli( $servername, $username, $password );

// Check connection
    if ($conn->connect_error) {
        return die( "Connection failed: " . $conn->connect_error );
    } else {
        return $conn;
    }

}
