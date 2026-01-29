<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link href="src/output.css" rel="stylesheet">
</head>

<header>
    <?php include 'includes/header.php'; ?>
</header>

<main>
    <!-- About Me Section -->
    <section class="max-w-4xl mx-auto mt-16 px-4">
        <h1 class="text-4xl font-bold mb-4">Hi, I'm [Your Name]</h1>
        <p class="text-lg mb-6">
            I'm a creative web developer passionate about building interactive and visually appealing websites.
            I enjoy experimenting with new web technologies and design concepts.
        </p>
        <a href="projects.php"
           class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            See my projects
        </a>
    </section>
</main>

<footer>
    <?php include 'includes/footer.php'; ?>
</footer>

<!-- Scripts -->
<script src="js/components.js" defer></script>
<script src="js/about-me.js" defer></script>
