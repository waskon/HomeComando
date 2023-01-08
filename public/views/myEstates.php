<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/main-page.css">
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/filter.js" defer></script>
    <!--    <script type="text/javascript" src="./public/js/myEstatesFilter.js" defer></script>-->
    <title>MY ESTATES</title>
</head>

<body>
<div class="base-container">
    <nav>
        <img src="public/img/logo-czarne.png">
        <ul>
            <li>
                <i class="material-symbols-rounded" style="font-size: 1.5em">home</i>
                <a href="/mainPage" class="button button-label">Main page</a>
            </li>
            <li>
                <i class="material-symbols-rounded" style="font-size: 1.5em">person</i>
                <a href="/myData" class="button button-label">My Data</a>
            </li>
            <li>
                <i class="material-symbols-rounded" style="font-size: 1.5em">apartment</i>
                <a href="/myEstates" class="button button-label">My Estates</a>
            </li>
            <li>
                <i class="material-symbols-rounded" style="font-size: 1.5em">favorite</i>
                <a href="/favorite" class="button button-label">Favorite</a>
            </li>
            <li>
                <i class="material-symbols-rounded" style="font-size: 1.5em">logout </i>
                <a href="/login" class="button button-label">Log out</a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class="search-bar">
                <label>
                    <input placeholder="search real-estate">
                </label>
            </div>
            <div class="add-announcement">
                <i class="material-symbols-rounded" style="font-size: 1em">add</i>
                <a href="/addNotice" style="color: #FFFFFF"> add announcement</a>
            </div>
        </header>
        <div class="filters">
            <div class="filter-bar">
                <div class="property-select purpose">
                    <select id="purpose" class="form-control">
                        <option value="">Select property:</option>
                        <option value="Home">Home</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Business premises">Business premises</option>
                        <option value="Plot">Plot</option>
                        <option value="Garage">Garage</option>
                    </select>
                </div>
                <form>
                    <label for="maxPrice">
                        <input id="maxPrice" type="number" min="1" placeholder="maximum price        (zł)">
                    </label>
                    <label for="sizeNumb">
                        <input id="sizeNumb" type="number" min="0.1" placeholder="area of property      (m2)">
                    </label>
                    <input id="submit" class="button-38 button-38-filled" type="button" value="Filter">
                </form>
            </div>
        </div>
        <section class="announcements">
            <?php foreach ($announcements as $announcement): ?>
                <div id="announcement-1">
                    <img src="public/uploads/<?= $announcement->getImage() ?>">
                    <div>
                        <h2><?= $announcement->getTitle(); ?></h2>
                        <p><?= $announcement->getDescription(); ?></p>
                        <div class="announcement-info">
                            <div class="social-section">
                                <i class="material-symbols-rounded"
                                   style="font-size: 2em; margin-top: 0.1em;">favorite</i>
                                <text>
                                    500
                                </text>
                            </div>
                            <!--                        <text> -->
                            <? //= $announcement->getPropertyType(); ?><!-- </text>-->
                            <text> <?= $announcement->getSize(); ?> m2</text>
                            <text class="price ">
                                Price = <?= $announcement->getPrice(); ?> zł
                            </text>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    </main>
</div>
</body>

<template id="announcementTemplate">
    <div id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
            <div class="announcement-info">
                <div class="social-section">
                    <i class="material-symbols-rounded"
                       style="font-size: 2em; margin-top: 0.1em;">favorite</i>
                    <text>
                        500
                    </text>
                </div>
                <text class="announcementSize"> 20.00 m2</text>
                <text class="price"> Price = 1000</text>
            </div>
        </div>
    </div>
</template>

</html>