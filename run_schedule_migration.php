<?php
require_once __DIR__ . '/php/db.php';
try {
    $sql = file_get_contents(__DIR__ . '/sql/create_schedule_table.sql');
    $pdo->exec($sql);
    echo "Schedule table created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
