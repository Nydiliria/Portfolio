<?php global $conn;
include '../includes/db.php';
include '../includes/header.php';

$id = $_GET['id'];
$project = $conn->query("SELECT * FROM projects WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $conn->query("UPDATE projects SET title='$title', description='$description' WHERE id=$id");

    foreach ($_FILES['photos']['name'] as $key => $name) {
        if ($_FILES['photos']['error'][$key] === 0) {
            $tmp_name = $_FILES['photos']['tmp_name'][$key];
            $target = '../uploads/' . time() . '_' . basename($name);
            if (move_uploaded_file($tmp_name, $target)) {
                $conn->query("INSERT INTO project_photos (project_id, filename) VALUES ($id, '$target')");
            }
        }
    }

    header("Location: index.php");
}
?>

<h1>Edit Project</h1>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>" required><br>
    <textarea name="description"><?= htmlspecialchars($project['description']) ?></textarea><br>
    <input type="file" name="photos[]" multiple><br>
    <button type="submit">Update Project</button>
</form>

<h3>Existing Photos</h3>
<?php
$photos = $conn->query("SELECT * FROM project_photos WHERE project_id=$id");
while ($photo = $photos->fetch_assoc()) {
    echo "<img src='../uploads/" . basename($photo['filename']) . "' width='100'> ";
    echo "<a href='delete_photo.php?id={$photo['id']}&project_id=$id'>Delete</a><br>";
}
?>

