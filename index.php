<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link href="src/output.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<main>
    <section class="max-w-4xl mx-auto mt-16 px-4">
        <h1 class="text-4xl font-bold mb-4">Hi, I'm Sander van Wijngaarden</h1>
        <p class="text-lg mb-6">
            I'm a student at Hogeschool Rotterdam, working and learning to become a creative and involved developer.
        </p>
        <a href="projects.php"
           class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            See my projects
        </a>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

<script src="js/components.js" defer></script>
<script src="js/about-me.js" defer></script>
</body>
</html>
