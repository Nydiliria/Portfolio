document.addEventListener('DOMContentLoaded', () => {
    const navbar = new NavBar(
        ['About', 'Projects', 'Contact'],
        ['index.php', 'projects.php', '#footer']
    );
    navbar.render(document.getElementById('navbar'));

    const projectContainer = document.getElementById('projects');

    fetch('/portfolio-crud/get-projects.php')
        .then(response => response.json())
        .then(projects => {
            projects.forEach(p => {
                const link = p.photos.length > 0 ? p.photos[0] : '#';
                const card = new ProjectCard(
                    p.title,
                    p.description,
                    link
                );
                card.render(projectContainer);
            });
        })
        .catch(err => {
            console.error('Failed to load projects:', err);
        });

    const footer = new Footer(
        'Feel free to reach out via email: example@email.com',
        '© 2026 [Your Name]'
    );
    footer.render(document.getElementById('footer'));
});
