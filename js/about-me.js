document.addEventListener('DOMContentLoaded', () => {
    const navbar = new NavBar(
        ['About', 'Projects', 'Contact'],
        ['index.php', 'projects.php', '#footer']
    );
    navbar.render(document.getElementById('navbar'));

    const footer = new Footer(
        'Feel free to reach out via email: example@email.com',
        '© 2026 [Your Name]'
    );
    footer.render(document.getElementById('footer'));
});
