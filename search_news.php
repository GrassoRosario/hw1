<?php

    $api_key = 'xxxxxxxxxxxxxxxxxxx';


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://gnews.io/api/v4/search?q=wwf&lang=it&apikey=" . $api_key );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    //echo "<pre>";
    echo $result;
    //echo "</pre>";
    curl_close($curl);

    ?>