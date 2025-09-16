<?php
$pdo = new PDO("mysql:host=mysql;dbname=ajax;charset=utf8", "root", "12345678");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = $_GET['action'] ?? '';

if ($action === 'list') {
    $stmt = $pdo->query("SELECT id, content FROM messages ORDER BY id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

if ($action === 'add') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!empty($data['content'])) {
        $stmt = $pdo->prepare("INSERT INTO messages (content) VALUES (?)");
        $stmt->execute([$data['content']]);
    }
    echo json_encode(['status' => 'ok']);
    exit;
}

echo json_encode(['error' => 'invalid action']);