<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';
session_start();

$action = $_GET['action'] ?? null;

if($action === 'assign' && $_SERVER['REQUEST_METHOD'] === 'POST'){
  $input = json_decode(file_get_contents('php://input'), true);
  $player_id = intval($input['player_id'] ?? 0);
  $agent_id = intval($input['agent_id'] ?? 0);
  if(!$player_id || !$agent_id){ http_response_code(400); echo json_encode(['error'=>'player_id and agent_id required']); exit; }
  $stmt = $pdo->prepare('INSERT INTO assignments (player_id, agent_id, assigned_at, assigned_by) VALUES (?, ?, NOW(), ?)');
  $stmt->execute([$player_id, $agent_id, $_SESSION['user_id'] ?? null]);
  echo json_encode(['success'=>true, 'id'=>$pdo->lastInsertId()]);
  exit;
}

if($action === 'unassign' && $_SERVER['REQUEST_METHOD'] === 'POST'){
  $input = json_decode(file_get_contents('php://input'), true);
  $id = intval($input['assignment_id'] ?? 0);
  if(!$id){ http_response_code(400); echo json_encode(['error'=>'assignment_id required']); exit; }
  $stmt = $pdo->prepare('UPDATE assignments SET unassigned_at = NOW(), unassigned_by = ? WHERE id = ?');
  $stmt->execute([$_SESSION['user_id'] ?? null, $id]);
  echo json_encode(['success'=>true]);
  exit;
}

if($action === 'list'){
  $stmt = $pdo->query('SELECT a.*, p.full_name as player_name, u.email as agent_email FROM assignments a LEFT JOIN players p ON a.player_id = p.id LEFT JOIN users u ON a.agent_id = u.id ORDER BY a.id DESC');
  echo json_encode($stmt->fetchAll());
  exit;
}

http_response_code(400);
echo json_encode(['error'=>'Invalid assignment action']);

?>
