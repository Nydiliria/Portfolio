document.addEventListener('DOMContentLoaded', () => {
    // Navbar
    const navbar = new NavBar(
        ['About', 'Projects', 'Contact'],
        ['index.php', 'projects.php', '#footer']
    );
    navbar.render(document.getElementById('navbar'));

    // Footer
    const footer = new Footer(
        'Feel free to reach out via email: sander2002@gmail.com',
        '© 2026 Sander van Wijngaarden'
    );
    footer.render(document.getElementById('footer'));

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({behavior: 'smooth'});
            }
        });
    });
});
