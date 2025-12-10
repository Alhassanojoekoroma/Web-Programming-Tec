<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

$action = $_GET['action'] ?? 'list';

if($action === 'list'){
  $stmt = $pdo->query('SELECT p.*, u.email as created_by_email FROM players p LEFT JOIN users u ON p.created_by = u.id ORDER BY p.id DESC');
  $players = $stmt->fetchAll();
  echo json_encode($players);
  exit;
}

if($action === 'read'){
  $id = intval($_GET['id'] ?? 0);
  if(!$id){ http_response_code(400); echo json_encode(['error'=>'id required']); exit; }
  $stmt = $pdo->prepare('SELECT * FROM players WHERE id = ?');
  $stmt->execute([$id]);
  echo json_encode($stmt->fetch());
  exit;
}

if($action === 'create'){
  $input = json_decode(file_get_contents('php://input'), true);
  $name = $input['full_name'] ?? '';
  if(!$name){ http_response_code(400); echo json_encode(['error'=>'full_name required']); exit; }
  $stmt = $pdo->prepare('INSERT INTO players (full_name, dob, nationality, position, preferred_foot, created_by, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())');
  $stmt->execute([ $name, $input['dob'] ?? null, $input['nationality'] ?? null, $input['position'] ?? null, $input['preferred_foot'] ?? null, $_SESSION['user_id'] ?? null ]);
  echo json_encode(['success'=>true, 'id'=>$pdo->lastInsertId()]);
  exit;
}

if($action === 'update'){
  $input = json_decode(file_get_contents('php://input'), true);
  $id = intval($input['id'] ?? 0);
  if(!$id){ http_response_code(400); echo json_encode(['error'=>'id required']); exit; }
  $stmt = $pdo->prepare('UPDATE players SET full_name=?, dob=?, nationality=?, position=?, preferred_foot=?, updated_at=NOW() WHERE id = ?');
  $stmt->execute([ $input['full_name'] ?? null, $input['dob'] ?? null, $input['nationality'] ?? null, $input['position'] ?? null, $input['preferred_foot'] ?? null, $id ]);
  echo json_encode(['success'=>true]);
  exit;
}

if($action === 'delete'){
  $id = intval($_GET['id'] ?? 0);
  if(!$id){ http_response_code(400); echo json_encode(['error'=>'id required']); exit; }
  $stmt = $pdo->prepare('DELETE FROM players WHERE id = ?');
  $stmt->execute([$id]);
  echo json_encode(['success'=>true]);
  exit;
}

http_response_code(400);
echo json_encode(['error'=>'Invalid players action']);

?>
