<?php
require_once __DIR__ . '/php/db.php';
try {
    $sql = file_get_contents(__DIR__ . '/sql/add_profile_columns.sql');
    $pdo->exec($sql);
    echo "Profile columns added successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
