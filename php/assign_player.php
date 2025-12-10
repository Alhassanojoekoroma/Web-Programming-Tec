<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $player_id = $_POST['player_id'];
        $agent_id = $_POST['agent_id'];

        // 1. Check if valid agent
        $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ? AND role = 'agent'");
        $stmt->execute([$agent_id]);
        if (!$stmt->fetch()) {
            echo json_encode(['error' => 'Invalid Agent ID']);
            exit;
        }

        // 2. Unassign previous active assignment
        $pdo->prepare("UPDATE assignments SET unassigned_at = NOW() WHERE player_id = ? AND unassigned_at IS NULL")->execute([$player_id]);

        // 3. Create new assignment
        $stmt = $pdo->prepare("INSERT INTO assignments (player_id, agent_id) VALUES (?, ?)");
        $stmt->execute([$player_id, $agent_id]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
