<?php
     $ch = curl_init();
    curl_setopt_array($ch,[
    CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=London&appid=9088d2ae2cb0dd96d52aec51b397a9b3",
    CURLOPT_RETURNTRANSFER => true
    ]);
    
    $responses = curl_exec($ch);

    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);

    echo $status_code, "\n";

    echo $responses, "\n";


?>