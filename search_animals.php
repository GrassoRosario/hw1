<?php

    $client_id = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $client_secret = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://meta.wikimedia.org/w/rest.php/oauth2/access_token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    //echo $result;
    curl_close($curl);
    
    $token = json_decode($result)->access_token;
    $query = ($_GET["q"]);

    $data = http_build_query(array("q" => $query));
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://api.wikimedia.org/core/v1/wikipedia/it/search/page?".$data);
    $headers = array("Authorization: Bearer ".$token);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    //echo "<pre>";
    echo $result;
    //echo "</pre>";
    curl_close($curl);

?>

