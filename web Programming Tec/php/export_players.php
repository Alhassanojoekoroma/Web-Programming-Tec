<?php
require_once __DIR__ . '/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized Access");
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="streetbull_players_report.csv"');

$output = fopen('php://output', 'w');

// Header
fputcsv($output, ['ID', 'Full Name', 'Street Name', 'Position', 'Club', 'Age', 'Shirt No', 'Goals', 'Played', 'Clean Sheets', 'Status', 'Registered Date']);

// Data
try {
    $stmt = $pdo->query("SELECT * FROM players ORDER BY created_at DESC");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($output, [
            $row['id'],
            $row['full_name'],
            $row['street_name'],
            $row['position'],
            $row['current_club'],
            $row['age'],
            $row['shirt_number'],
            $row['goals'],
            $row['played'],
            $row['clean_sheets'],
            $row['status'],
            $row['created_at']
        ]);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

fclose($output);
