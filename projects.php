<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link href="src/output.css" rel="stylesheet">
</head>

<?php include 'includes/header.php'; ?>

<main>
    <!-- Projects Section -->
    <section class="max-w-6xl mx-auto mt-16 px-4">
        <h1 class="text-4xl font-bold mb-8">My Projects</h1>
        <div id="projects" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8"></div>
    </section>
    <a href="portfolio-crud/add-project.php">New project (remove later)</a>
</main>

<?php include 'includes/footer.php'; ?>


<!-- Scripts -->
<script src="js/components.js" defer></script>
<script src="js/projects.js" defer></script>
