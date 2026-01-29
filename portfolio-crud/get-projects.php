<?php global $conn;
require_once '../includes/db.php';

$sql = "
    SELECT 
        p.id,
        p.title,
        p.description,
        ph.filename
    FROM portfolio.projects p
    LEFT JOIN portfolio.project_photos ph ON p.id = ph.project_id
    ORDER BY p.created_at DESC
";

$result = $conn->query($sql);

$projects = [];

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];

    if (!isset($projects[$id])) {
        $projects[$id] = [
            'id' => $id,
            'title' => $row['title'],
            'description' => $row['description'],
            'photos' => []
        ];
    }

    if ($row['filename']) {
        // Make path usable for frontend
        $projects[$id]['photos'][] = str_replace('../', '', $row['filename']);
    }
}

header('Content-Type: application/json');
echo json_encode(array_values($projects));
