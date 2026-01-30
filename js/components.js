// Navigation bar
class NavBar {
    constructor(items, links) {
        this.items = items;
        this.links = links;
    }

    render(target) {
        const nav = document.createElement('nav');
        nav.className = 'bg-blue-700 text-white shadow-md sticky top-0 z-10';
        nav.innerHTML = `
            <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="text-xl font-bold">Sander van Wijngaarden</div>
                <ul class="flex space-x-6">
                    ${this.items.map((item, i) => `<li><a href="${this.links[i]}" class="hover:text-blue-300 transition">${item}</a></li>`).join('')}
                </ul>
            </div>
        `;
        target.appendChild(nav);
    }
}

// Project card
class ProjectCard {
    constructor(title, description, link, coverImage) {
        this.title = title;
        this.description = description;
        this.link = link;
        this.coverImage = coverImage;
    }

    render(target) {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col overflow-hidden';
        card.innerHTML = `
            <img src="${this.coverImage}" alt="${this.title}" class="w-full h-48 object-cover">
            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-xl font-semibold mb-2 text-gray-900">${this.title}</h2>
                <p class="mb-4 text-gray-700 flex-grow">${this.description}</p>
                <a href="${this.link}" class="mt-auto text-blue-700 hover:text-blue-800 underline">View Project</a>
            </div>
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
        footer.className = 'bg-gray-100 text-gray-700 py-8 mt-16';
        footer.innerHTML = `
            <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-center md:text-left">${this.contactText}</p>
                <p class="text-center md:text-right text-sm">${this.copyright}</p>
            </div>
        `;
        target.appendChild(footer);
    }
}
