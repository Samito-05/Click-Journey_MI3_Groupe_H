<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ville = $_POST['ville'] ?? '';
    $destinations = json_decode(file_get_contents("../json/destination.json"), true);
    $destination = array_filter($destinations, function($d) use ($ville) {
        return $d['lieu'] === $ville;
    });
    $destination = reset($destination);
    $options = [];
    if ($destination) {
        $options = array_merge($destination['rando'] ?? [], $destination['activite'] ?? []);
    }
    header('Content-Type: application/json');
    echo json_encode($options);
    exit;
}
http_response_code(400);
echo json_encode([]);
exit;
?>