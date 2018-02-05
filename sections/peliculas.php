<?php

$curl = curl_init();

curl_setopt_array( $curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/movie/100?language=es-ES&api_key=621de08fa0708829ee58ad4ad768bd12",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
) );

$response = curl_exec( $curl );
$err = curl_error( $curl );

curl_close( $curl );

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //echo $response;
    var_dump( $response );
}