<?php
global $conn;
require_once 'includes/db.php';

$id = (int)($_GET['id'] ?? 0);

/* ---------- Fetch project ---------- */
$projectStmt = $conn->prepare(
        "SELECT * FROM portfolio.projects WHERE id = ? LIMIT 1"
);
$projectStmt->bind_param("i", $id);
$projectStmt->execute();
$project = $projectStmt->get_result()->fetch_assoc();

if (!$project) {
    http_response_code(404);
    require_once 'includes/header.php';
    echo "<main class='max-w-4xl mx-auto py-16 px-4'>Project not found.</main>";
    require_once 'includes/footer.php';
    exit;
}

/* ---------- Fetch photos ---------- */
$photoStmt = $conn->prepare(
        "SELECT filename FROM project_photos WHERE project_id = ?"
);
$photoStmt->bind_param("i", $id);
$photoStmt->execute();
$photos = $photoStmt->get_result();

require_once 'includes/header.php';
?>

<main>
    <article class="max-w-4xl mx-auto py-16 px-4 space-y-6">

        <h1 class="text-4xl font-bold">
            <?= htmlspecialchars($project['title']) ?>
        </h1>

        <dl class="text-gray-600 text-sm space-y-1">
            <div>
                <dt class="font-semibold inline">Role:</dt>
                <dd class="inline ml-1"><?= htmlspecialchars($project['role']) ?></dd>
            </div>

            <div>
                <dt class="font-semibold inline">Status:</dt>
                <dd class="inline ml-1"><?= htmlspecialchars($project['status']) ?></dd>
            </div>

            <div>
                <dt class="font-semibold inline">Team Size:</dt>
                <dd class="inline ml-1"><?= (int)$project['team_size'] ?></dd>
            </div>

            <div>
                <dt class="font-semibold inline">Tech Stack:</dt>
                <dd class="inline ml-1"><?= htmlspecialchars($project['tech_stack']) ?></dd>
            </div>

            <?php if (!empty($project['github_url'])): ?>
                <div>
                    <dt class="font-semibold inline">GitHub:</dt>
                    <dd class="inline ml-1">
                        <a
                                href="<?= htmlspecialchars($project['github_url']) ?>"
                                target="_blank"
                                rel="noopener"
                                class="underline"
                        >
                            View repository
                        </a>
                    </dd>
                </div>
            <?php endif; ?>
        </dl>

        <?php if ($photos->num_rows > 0): ?>
            <section
                    aria-label="Project images"
                    class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6"
            >
                <?php while ($photo = $photos->fetch_assoc()): ?>
                    <figure>
                        <img
                                src="/uploads/<?= htmlspecialchars(basename($photo['filename'])) ?>"
                                alt="<?= htmlspecialchars($project['title']) ?>"
                                class="rounded-lg shadow"
                                loading="lazy"
                        >
                    </figure>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

    </article>
</main>

<?php require_once 'includes/footer.php'; ?>
