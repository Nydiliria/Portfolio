<?php global $conn;
require_once 'includes/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$project = $conn->query("SELECT * FROM projects WHERE id = $id")->fetch_assoc();
$photos = $conn->query("SELECT * FROM project_photos WHERE project_id = $id");

require_once 'includes/header.php';
?>

<article class="max-w-4xl mx-auto py-16 px-4 space-y-6">
    <header>
        <h1 class="text-4xl font-bold"><?= htmlspecialchars($project['title']) ?></h1>
    </header>

    <ul class="text-gray-600 space-y-1 text-sm">
        <li><strong>Role:</strong> <?= htmlspecialchars($project['role']) ?></li>
        <li><strong>Status:</strong> <?= $project['status'] ?></li>
        <li><strong>Team Size:</strong> <?= $project['team_size'] ?></li>
        <li><strong>Tech Stack:</strong> <?= htmlspecialchars($project['tech_stack']) ?></li>
        <?php if ($project['github_url']): ?>
            <li><strong>GitHub:</strong> <a href="<?= $project['github_url'] ?>" target="_blank"
                                            class="underline"><?= $project['github_url'] ?></a></li>
        <?php endif; ?>
    </ul>

    <?php if ($photos->num_rows > 0): ?>
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <?php while ($photo = $photos->fetch_assoc()): ?>
                <img src="uploads/<?= basename($photo['filename']) ?>" alt="<?= htmlspecialchars($project['title']) ?>"
                     class="rounded-lg shadow">
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
</article>

<?php require_once 'includes/footer.php'; ?>
