<?php global $conn;
include '../includes/db.php';

$id = $_GET['id'];

// Delete photos from folder
$photos = $conn->query("SELECT filename FROM project_photos WHERE project_id=$id");
while ($photo = $photos->fetch_assoc()) {
    $file = '../uploads/' . basename($photo['filename']);
    if (file_exists($file)) unlink($file);
}

// Delete project (photos deleted automatically via foreign key CASCADE)
$conn->query("DELETE FROM projects WHERE id=$id");

header("Location: index.php");
