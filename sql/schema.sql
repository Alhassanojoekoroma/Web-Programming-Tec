-- MySQL schema for Street Bull (minimal)
CREATE DATABASE IF NOT EXISTS `streetbull` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `streetbull`;

-- Users table (admins, agents, players, club managers)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role VARCHAR(32) NOT NULL DEFAULT 'player',
  created_at DATETIME,
  updated_at DATETIME
);

-- Players
CREATE TABLE IF NOT EXISTS players (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255) NOT NULL,
  dob DATE NULL,
  nationality VARCHAR(128) NULL,
  height_cm INT NULL,
  weight_kg INT NULL,
  preferred_foot VARCHAR(16) NULL,
  position VARCHAR(64) NULL,
  current_club VARCHAR(255) NULL,
  status VARCHAR(32) DEFAULT 'available',
  created_by INT NULL,
  created_at DATETIME,
  updated_at DATETIME,
  FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Assignments history
CREATE TABLE IF NOT EXISTS assignments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  player_id INT NOT NULL,
  agent_id INT NOT NULL,
  assigned_at DATETIME,
  assigned_by INT NULL,
  unassigned_at DATETIME NULL,
  unassigned_by INT NULL,
  FOREIGN KEY (player_id) REFERENCES players(id) ON DELETE CASCADE,
  FOREIGN KEY (agent_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Clubs (basic)
CREATE TABLE IF NOT EXISTS clubs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  country VARCHAR(128) NULL
);

-- Simple seed admin (change password after import)
INSERT IGNORE INTO users (id, email, password_hash, role, created_at) VALUES (1, 'admin@streetbull.local', '$2y$10$exampleexampleexampleexampleexampleex', 'admin', NOW());
