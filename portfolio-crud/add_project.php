<?php global $conn;
include '../includes/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO projects (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);
    $stmt->execute();
    $project_id = $stmt->insert_id;

    // Handle multiple photo uploads
    foreach ($_FILES['photos']['name'] as $key => $name) {
        if ($_FILES['photos']['error'][$key] === 0) {
            $tmp_name = $_FILES['photos']['tmp_name'][$key];
            $target = '../uploads/' . time() . '_' . basename($name);
            if (move_uploaded_file($tmp_name, $target)) {
                $stmt2 = $conn->prepare("INSERT INTO project_photos (project_id, filename) VALUES (?, ?)");
                $stmt2->bind_param("is", $project_id, $target);
                $stmt2->execute();
            }
        }
    }

    header("Location: index.php");
}
?>

<h1>Add Project</h1>
<form method="post" enctype="multipart/form-data">
    <label>
        <input type="text" name="title" placeholder="Project Title" required>
    </label><br>
    <label>
        <textarea name="description" placeholder="Description"></textarea>
    </label><br>
    <input type="file" name="photos[]" multiple><br>
    <button type="submit">Add Project</button>
</form>

