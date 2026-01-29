document.addEventListener('DOMContentLoaded', () => {
    const navbar = new NavBar(
        ['About', 'Projects', 'Contact'],
        ['index.php', 'projects.php', '#footer']
    );
    navbar.render(document.getElementById('navbar'));

    const footer = new Footer(
        'Feel free to reach out via email: sander2002@gmail.com',
        '© 2026 Sander van Wijngaarden'
    );
    footer.render(document.getElementById('footer'));
});
