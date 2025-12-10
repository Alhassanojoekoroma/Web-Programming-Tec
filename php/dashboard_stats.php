<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

try {
    $response = [];

    // Total Players
    $stmt = $pdo->query("SELECT COUNT(*) FROM players");
    $response['total_players'] = $stmt->fetchColumn();

    // Total Agents (Users with role 'agent')
    $stmt = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'agent'");
    $response['total_agents'] = $stmt->fetchColumn();

    // Active Assignments (where unassigned_at is null)
    $stmt = $pdo->query("SELECT COUNT(*) FROM assignments WHERE unassigned_at IS NULL");
    $response['active_assignments'] = $stmt->fetchColumn();

    // Pending Approvals (Mocking this as players with status 'pending')
    $stmt = $pdo->query("SELECT COUNT(*) FROM players WHERE status = 'pending'");
    $response['pending_approvals'] = $stmt->fetchColumn();

    // Recent Players
    $stmt = $pdo->query("SELECT full_name, position, current_club, status, created_at FROM players ORDER BY created_at DESC LIMIT 5");
    $response['recent_players'] = $stmt->fetchAll();

    // Recent Activity (Mocked as just new player registrations for now)
    $stmt = $pdo->query("SELECT full_name as user_name, 'registered as new player' as action, created_at FROM players ORDER BY created_at DESC LIMIT 5");
    $response['recent_activity'] = $stmt->fetchAll();

    // Top Agents (Mocked: Agents with most assignments)
    // If no data, return empty or mock
    $stmt = $pdo->query("
        SELECT u.email as name, COUNT(a.id) as count 
        FROM users u 
        JOIN assignments a ON u.id = a.agent_id 
        GROUP BY u.id 
        ORDER BY count DESC 
        LIMIT 4
    ");
    $response['top_agents'] = $stmt->fetchAll();


    echo json_encode($response);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
