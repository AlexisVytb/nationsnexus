<?php
require_once 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://publicapi.nationsglory.fr/playercount', [
    'headers' => [
        'accept' => 'application/json',
        'Authorization' => 'Bearer NGAPI_jS5*wfuPJ85XMd^9tIhm9VRcuAvSXH9Bd035a6b8584845d458356818112071a2', // Remplace ici par ton token
    ],
]);

$data = json_decode($response->getBody(), true);

// Récupère les données des serveurs spécifiques
$servers = ['delta', 'omega', 'sigma', 'alpha', 'epsilon'];

$players = [];
foreach ($servers as $server) {
    if (isset($data[$server])) {
        $players[$server] = $data[$server]['players'];
    }
}

echo json_encode($players); // Renvoie les données des serveurs sous forme de JSON pour JavaScript
?>
