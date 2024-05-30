    <?php
    $query = ($_GET["q"]);

    $data = http_build_query(array("titles" => $query, "format"=> "json", "action" => "query", "origin" => "*", "prop" => "extracts", "redirects" => "1"));
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://it.wikipedia.org/w/api.php?" . $data . "&explaintext");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    //echo "<pre>";
    echo $result;
    //echo "</pre>";
    curl_close($curl);

    ?>