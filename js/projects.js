document.addEventListener('DOMContentLoaded', () => {
    const navbar = new NavBar(
        ['About', 'Projects', 'Contact'],
        ['index.php', 'projects.php', '#footer']
    );
    navbar.render(document.getElementById('navbar'));

    const projects = [
        {title: 'Project One', description: 'A creative web app built with HTML, CSS, JS', link: '#'},
        {title: 'Project Two', description: 'An interactive UI project', link: '#'},
        {title: 'Project Three', description: 'A fun experiment with animations', link: '#'},
    ];

    const projectContainer = document.getElementById('projects');
    projects.forEach(p => {
        const card = new ProjectCard(p.title, p.description, p.link);
        card.render(projectContainer);
    });

    const footer = new Footer(
        'Feel free to reach out via email: example@email.com',
        '© 2026 [Your Name]'
    );
    footer.render(document.getElementById('footer'));
});
