<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    use app\db\Database;
    use app\models\Channel;
    use app\utils\SanitizeHelper;

    $db = new Database();
    $channel = new Channel($db);

    $data = $channel->get();
    $rowsCount = $data->rowCount();

    if ($rowsCount > 0)
    {
        $channelsArr = [];
        $rows = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row)
            array_push($channelsArr, $row);

        echo json_encode($channelsArr);
    }
    else
        echo json_encode(['message'=>"Brak kanałów w bazie"]);

