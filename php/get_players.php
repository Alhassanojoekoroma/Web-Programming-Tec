<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';

try {
    $sql = "SELECT * FROM players WHERE 1=1";
    $params = [];

    // Filtering
    if (!empty($_GET['season'])) {
        // Assuming season logic if you had a season column, currently placeholder
    }
    if (!empty($_GET['country'])) {
        //$sql .= " AND street_name = ?"; 
        // Note: The UI says "Country" but the options are "Street Names" based on your prompt.
        // We'll map 'street_name' to this filter context if that's what user intends, 
        // OR we map 'nationality'. I will search by nationality or street_name.
        $sql .= " AND (nationality LIKE ? OR street_name LIKE ?)";
        $params[] = '%' . $_GET['country'] . '%';
        $params[] = '%' . $_GET['country'] . '%';
    }
    if (!empty($_GET['league'])) {
        // Placeholder for league logic
    }
    if (!empty($_GET['club'])) {
        $sql .= " AND current_club LIKE ?";
        $params[] = '%' . $_GET['club'] . '%';
    }

    $sql .= " ORDER BY created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $players = $stmt->fetchAll();

    echo json_encode($players);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
