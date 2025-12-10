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
        $title = $_POST['title'];
        $event_date = $_POST['event_date'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $created_by = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO schedules (title, event_date, location, description, created_by) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $event_date, $location, $description, $created_by]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
