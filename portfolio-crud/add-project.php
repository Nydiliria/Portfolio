<?php global $conn;
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $team_size = (int)$_POST['team_size'];
    $status = $_POST['status'];
    $github_url = $_POST['github_url'];
    $featured = isset($_POST['featured']) ? 1 : 0;

    $stmt = $conn->prepare(
            "INSERT INTO projects
        (title, role, description, tech_stack, team_size, status, github_url, featured)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param(
            "ssssissi",
            $title, $role, $description, $tech_stack,
            $team_size, $status, $github_url, $featured
    );
    $stmt->execute();
    $project_id = $stmt->insert_id;

    foreach ($_FILES['photos']['name'] as $key => $name) {
        if ($_FILES['photos']['error'][$key] === 0) {
            $tmp_name = $_FILES['photos']['tmp_name'][$key];
            $target = '../uploads/' . time() . '_' . basename($name);
            if (move_uploaded_file($tmp_name, $target)) {
                $stmt2 = $conn->prepare(
                        "INSERT INTO project_photos (project_id, filename) VALUES (?, ?)"
                );
                $stmt2->bind_param("is", $project_id, $target);
                $stmt2->execute();
            }
        }
    }

    header("Location: index.php");
    exit;
}

require_once '../includes/header.php';
?>

<section class="min-h-screen flex items-center justify-center bg-red-950 py-16 px-4">
    <div class="bg-white w-full max-w-xl p-8 rounded-lg shadow-lg">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-center">Add New Project</h1>
        </header>

        <form method="post" enctype="multipart/form-data" class="space-y-4">
            <fieldset class="space-y-1">
                <label for="title" class="block font-medium">Project Title</label>
                <input type="text" id="title" name="title" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </fieldset>

            <fieldset class="space-y-1">
                <label for="role" class="block font-medium">Your Role</label>
                <input type="text" id="role" name="role"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </fieldset>

            <fieldset class="space-y-1">
                <label for="description" class="block font-medium">Short Description</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </fieldset>

            <fieldset class="space-y-1">
                <label for="tech_stack" class="block font-medium">Tech Stack</label>
                <input type="text" id="tech_stack" name="tech_stack"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       placeholder="PHP, MySQL, JS">
            </fieldset>

            <fieldset class="space-y-1">
                <label for="team_size" class="block font-medium">Team Size</label>
                <input type="number" id="team_size" name="team_size" min="1"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </fieldset>

            <fieldset class="space-y-1">
                <label for="status" class="block font-medium">Project Status</label>
                <select id="status" name="status"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Finished">Finished</option>
                    <option value="Prototype">Prototype</option>
                    <option value="WIP">WIP</option>
                </select>
            </fieldset>

            <fieldset class="space-y-1">
                <label for="github_url" class="block font-medium">GitHub URL</label>
                <input type="url" id="github_url" name="github_url"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </fieldset>

            <fieldset class="flex items-center gap-2">
                <input type="checkbox" id="featured" name="featured" value="1">
                <label for="featured" class="font-medium">Featured project</label>
            </fieldset>

            <fieldset class="space-y-1">
                <label for="photos" class="block font-medium">Project Photos</label>
                <input type="file" id="photos" name="photos[]" multiple>
            </fieldset>

            <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Add Project
            </button>
        </form>
    </div>
</section>


<?php require_once '../includes/footer.php'; ?>
