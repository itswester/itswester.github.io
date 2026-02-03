<?php
header('Access-Control-Allow-Origin: *'); // или укажи свой домен
header('Content-Type: application/json');

$access_token = $_GET['access_token'] ?? '';
$user_id = $_GET['user_id'] ?? '';

if (!$access_token || !$user_id) {
  echo json_encode(['error' => 'Нет токена или ID']);
  exit;
}

$url = "https://api.vk.com/method/users.get?user_ids=$user_id&fields=first_name,last_name,photo_100&access_token=$access_token&v=5.199";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // только для теста, в продакшене оставь true
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
