<?php global $conn;
/** @var mysqli $db */
require_once '../includes/db.php';
include '../includes/header.php';

?>

<h1>Projects</h1>

<?php
$result = $conn->query("SELECT * FROM portfolio.projects ORDER BY created_at DESC");
while ($project = $result->fetch_assoc()) {
    echo "<h2>{$project['title']}</h2>";
    echo "<p>{$project['description']}</p>";
    echo "<a href='edit_project.php?id={$project['id']}'>Edit</a> | ";
    echo "<a href='delete_project.php?id={$project['id']}'>Delete</a><br>";

    // Show photos
    $photos = $conn->query("SELECT * FROM project_photos WHERE project_id={$project['id']}");
    while ($photo = $photos->fetch_assoc()) {
        echo "<img src='../uploads/" . basename($photo['filename']) . "' width='100'> ";
    }
    echo "<hr>";
}
?>

<a href="add_project.php">Add New Project</a>

