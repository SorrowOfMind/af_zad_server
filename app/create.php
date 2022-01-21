<?php

require_once __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

use app\db\Database;
use app\models\Channel;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $db = new Database();
    $channel = new Channel($db);

    $data = json_decode(file_get_contents("php://input"), TRUE);

    $channel->name = $data['name'];
    $channel->clients = $data['number'];

    if ($channel->create()) 
        echo json_encode(['message'=>'Dodano kanał']);
    else 
        echo json_encode(['message'=>'Dodanie kanału nie powiodło się']);
}