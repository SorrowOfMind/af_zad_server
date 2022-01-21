<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: DELETE');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    use app\db\Database;
    use app\models\Channel;

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE')
{
    $db = new Database();
    $channel = new Channel($db);

    $id = $_GET['id'];

    $channel->id = $id;

    if ($channel->delete()) 
        echo json_encode(['message'=>'Usunięto kanał']);
    else 
        echo json_encode(['message'=>'Usunięcie kanału nie powiodło się']);
}
