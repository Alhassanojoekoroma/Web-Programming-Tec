<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? null;

// Simple registration and login endpoints
if($method === 'POST' && $action === 'register'){
  $input = json_decode(file_get_contents('php://input'), true);
  $email = $input['email'] ?? '';
  $password = $input['password'] ?? '';
  $role = $input['role'] ?? 'player';

  if(!$email || !$password){ http_response_code(400); echo json_encode(['error'=>'email and password required']); exit; }

  // check existing
  $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
  $stmt->execute([$email]);
  if($stmt->fetch()){ http_response_code(409); echo json_encode(['error'=>'Email already registered']); exit; }

  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare('INSERT INTO users (email, password_hash, role, created_at) VALUES (?, ?, ?, NOW())');
  $stmt->execute([$email, $hash, $role]);
  echo json_encode(['success'=>true, 'id' => $pdo->lastInsertId()]);
  exit;
}

if($method === 'POST' && $action === 'login'){
  $input = json_decode(file_get_contents('php://input'), true);
  $email = $input['email'] ?? '';
  $password = $input['password'] ?? '';

  $stmt = $pdo->prepare('SELECT id, password_hash, role FROM users WHERE email = ?');
  $stmt->execute([$email]);
  $user = $stmt->fetch();
  if(!$user || !password_verify($password, $user['password_hash'])){ http_response_code(401); echo json_encode(['error'=>'Invalid credentials']); exit; }

  // set session
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['role'] = $user['role'];
  echo json_encode(['success'=>true, 'id'=>$user['id'], 'role'=>$user['role']]);
  exit;
}

if($method === 'POST' && $action === 'logout'){
  session_destroy();
  echo json_encode(['success'=>true]);
  exit;
}

http_response_code(400);
echo json_encode(['error'=>'Invalid auth action']);

?>
