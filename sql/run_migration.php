<?php
require_once __DIR__ . '/../php/db.php';

try {
    $sql = "ALTER TABLE players 
            ADD COLUMN IF NOT EXISTS street_name VARCHAR(255) NULL AFTER full_name,
            ADD COLUMN IF NOT EXISTS age INT NULL AFTER dob,
            ADD COLUMN IF NOT EXISTS shirt_number INT NULL AFTER age,
            ADD COLUMN IF NOT EXISTS played INT DEFAULT 0,
            ADD COLUMN IF NOT EXISTS clean_sheets INT DEFAULT 0,
            ADD COLUMN IF NOT EXISTS goals INT DEFAULT 0,
            ADD COLUMN IF NOT EXISTS image_url VARCHAR(512) NULL";

    $pdo->exec($sql);
    echo "Table 'players' updated successfully.";
} catch (PDOException $e) {
    echo "Error updating table: " . $e->getMessage();
}
