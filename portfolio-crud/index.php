<?php global $conn;
require_once '../includes/db.php';
require_once '../includes/header.php';

$result = $conn->query("SELECT * FROM portfolio.projects ORDER BY created_at DESC");
?>

<section class="max-w-4xl mx-auto py-16 px-4">
    <h1 class="text-3xl font-bold mb-8">Projects</h1>

    <a href="add-project.php" class="inline-block mb-6 bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Add New
        Project</a>

    <?php while ($project = $result->fetch_assoc()): ?>
        <div class="border p-4 rounded mb-6">
            <h2 class="text-xl font-bold"><?= htmlspecialchars($project['title']) ?></h2>
            <p class="text-gray-600"><?= htmlspecialchars($project['description']) ?></p>
            <p class="text-sm text-gray-500">
                <strong>Role:</strong> <?= htmlspecialchars($project['role']) ?> |
                <strong>Status:</strong> <?= $project['status'] ?> |
                <strong>Team Size:</strong> <?= $project['team_size'] ?>
            </p>
            <p class="text-sm text-gray-500">
                <strong>Tech:</strong> <?= htmlspecialchars($project['tech_stack']) ?>
            </p>
            <?php if ($project['github_url']): ?>
                <a href="<?= $project['github_url'] ?>" target="_blank" class="underline">GitHub</a>
            <?php endif; ?>
            <div class="mt-2">
                <a href="edit-project.php?id=<?= $project['id'] ?>" class="text-blue-600 underline">Edit</a> |
                <a href="delete-project.php?id=<?= $project['id'] ?>" class="text-red-600 underline">Delete</a>
            </div>

            <div class="flex gap-2 mt-4">
                <?php
                $photos = $conn->query("SELECT * FROM project_photos WHERE project_id={$project['id']}");
                while ($photo = $photos->fetch_assoc()):
                    ?>
                    <img src="/uploads/<?= basename($photo['filename']) ?>" width="100" class="rounded" alt="">
                <?php endwhile; ?>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<?php require_once '../includes/footer.php'; ?>
