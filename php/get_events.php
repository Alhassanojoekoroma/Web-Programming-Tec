<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

try {
    $stmt = $pdo->query("SELECT * FROM schedules ORDER BY event_date ASC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
