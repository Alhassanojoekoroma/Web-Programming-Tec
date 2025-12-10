<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing ID']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT p.*, a.agent_id, u.email as agent_name 
        FROM players p 
        LEFT JOIN assignments a ON p.id = a.player_id AND a.unassigned_at IS NULL
        LEFT JOIN users u ON a.agent_id = u.id
        WHERE p.id = ?
    ");
    $stmt->execute([$_GET['id']]);
    $player = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$player) {
        http_response_code(404);
        echo json_encode(['error' => 'Player not found']);
        exit;
    }

    echo json_encode($player);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
