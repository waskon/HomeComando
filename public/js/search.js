const search = document.querySelector('input[placeholder="search real-estate"]');
const announcementContainer = document.querySelector(".announcements");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (announcements) {
            announcementContainer.innerHTML = "";
            loadAnnouncements(announcements)
        });
    }
});

function loadAnnouncements(announcements) {
    announcements.forEach(announcement => {
        console.log(announcement);
        createAnnouncement(announcement);
    });
}

function createAnnouncement(announcement) {
    const template = document.querySelector("#announcementTemplate");
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${announcement.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = announcement.title;
    const description = clone.querySelector("p");
    description.innerHTML = announcement.description;

    const price = clone.querySelector(".price");
    price.innerHTML = 'Price = ' + announcement.price + 'zł';

    const size = clone.querySelector(".announcementSize");
    size.innerHTML = announcement.size + 'm2';

    announcementContainer.appendChild(clone);
}

