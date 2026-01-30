document.addEventListener('DOMContentLoaded', () => {
    const navbar = new NavBar(
        ['About', 'Projects', 'Contact'],
        ['index.php', 'projects.php', '#footer']
    );
    navbar.render(document.getElementById('navbar'));

    const projectContainer = document.getElementById('projects');

    fetch('portfolio-crud/get-projects.php')
        .then(res => res.json())
        .then(projects => {
            projects.forEach(p => {
                const link = `project-detail.php?id=${p.id}`;

                // Pick the first photo as cover, or fallback to default
                const cover = p.photos.length > 0 ? `/${p.photos[0]}` : '/uploads/default-cover.jpg';

                const card = new ProjectCard(
                    p.title,
                    p.description,
                    link,
                    cover
                );

                card.render(projectContainer);
            });
        });

    const footer = new Footer(
        'Feel free to reach out via email: example@email.com',
        '© 2026 Sander van Wijngaarden'
    );
    footer.render(document.getElementById('footer'));
});
