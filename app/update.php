<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: PUT');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    use app\db\Database;
    use app\models\Channel;

    if ($_SERVER['REQUEST_METHOD'] === 'PUT')
{
    $db = new Database();
    $channel = new Channel($db);

    $id = SanitizeHelper::sanitizeData($_GET['id']);
    $data = json_decode(file_get_contents("php://input"), TRUE);

    $channel->id = $id;
    $channel->clients = $data['num_clients'];

    if ($channel->update()) 
        echo json_encode(['message'=>'Zedytowano kanał']);
    else 
        echo json_encode(['message'=>'Zedytowanie kanału nie powiodło się']);
}