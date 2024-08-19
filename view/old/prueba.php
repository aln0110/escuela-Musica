<?php
//$url = "https://americas.api.riotgames.com/riot/account/v1/accounts/by-riot-id/apologix/aplx?api_key=RGAPI-e3ece5c4-069e-451b-a5ca-936904e8b6e1";
//$response = file_get_contents($url);
//echo $response;

echo "<br>";
echo "<br>";

/*
$url2 = "http://localhost:8080/api/getAll2.php";
$response2 = @file_get_contents($url2);
if ($response2 === FALSE) {
    $error = error_get_last();
    echo "Error: " . $error['message'];
} else {
    echo "Response: " . $response2;
}
    */
    
 echo "<br>";
 echo "<br>";


$ch = curl_init("http://localhost:8080/api/getAll2.php");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response2 = curl_exec($ch);


//curl_close($ch);


?>