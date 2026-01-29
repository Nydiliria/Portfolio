// Navigation bar
class NavBar {
    constructor(items, links) {
        this.items = items;
        this.links = links;
    }

    render(target) {
        const nav = document.createElement('nav');
        nav.className = 'bg-white shadow-md sticky top-0 z-10';
        nav.innerHTML = `
            <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="text-xl font-bold">My Portfolio</div>
                <ul class="flex space-x-6">
                    ${this.items.map((item, i) => `<li><a href="${this.links[i]}" class="hover:text-blue-600">${item}</a></li>`).join('')}
                </ul>
            </div>
        `;
        target.appendChild(nav);
    }
}

// Project card
class ProjectCard {
    constructor(title, description, link) {
        this.title = title;
        this.description = description;
        this.link = link;
    }

    render(target) {
        const card = document.createElement('div');
        card.className = 'bg-white p-6 rounded-lg shadow hover:shadow-lg transition';
        card.innerHTML = `
            <h2 class="text-2xl font-semibold mb-2">${this.title}</h2>
            <p class="mb-4">${this.description}</p>
            <a href="${this.link}" class="text-blue-600 hover:underline">View project</a>
        `;
        target.appendChild(card);
    }
}

// Footer
class Footer {
    constructor(contactText, copyright) {
        this.contactText = contactText;
        this.copyright = copyright;
    }

    render(target) {
        const footer = document.createElement('footer');
        footer.className = 'bg-gray-200 text-gray-700 py-8 mt-16 text-center';
        footer.innerHTML = `
            <p class="mb-2">${this.contactText}</p>
            <p>${this.copyright}</p>
        `;
        target.appendChild(footer);
    }
}
