<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Basic validation
        if (empty($_POST['full_name']) || empty($_POST['position'])) {
            throw new Exception("Name and position are required.");
        }

        // Handle Image Upload (Basic)
        $image_url = 'https://via.placeholder.com/300x400'; // Default
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../images/uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $filename = uniqid() . '_' . basename($_FILES['profile_pic']['name']);
            $targetPath = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetPath)) {
                $image_url = 'images/uploads/' . $filename;
            }
        }

        $sql = "INSERT INTO players (
            full_name, street_name, age, shirt_number, 
            played, clean_sheets, goals, 
            position, nationality, current_club, image_url, created_by, created_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['full_name'],
            $_POST['street_name'] ?? null,
            $_POST['age'] ?? null,
            $_POST['shirt_number'] ?? null,
            $_POST['played'] ?? 0,
            $_POST['clean_sheets'] ?? 0,
            $_POST['goals'] ?? 0,
            $_POST['position'],
            $_POST['nationality'] ?? 'SLE',
            $_POST['current_club'] ?? 'Street Bull FC',
            $image_url,
            $_SESSION['user_id']
        ]);

        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
