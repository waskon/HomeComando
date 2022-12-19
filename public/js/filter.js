document.getElementById("submit").addEventListener("click", function () {
    let purpose = document.getElementById("purpose").value;
    let price = document.getElementById("maxPrice").value;
    let size = document.getElementById("sizeNumb").value;

    if (price === "") {
        price = Number.MAX_VALUE;
    }
    if (size === "") {
        size = 0;
    }

    const data = {purpose: purpose, maxPrice: price, size: size};
    fetch("/filter", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (announcements) {
        document.querySelector(".announcements").innerHTML = "";
        loadAnnouncements(announcements)
    });
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