<?php
//session_start();
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/main-page.css">
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>MAIN PAGE</title>
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
                <a href="/logout" class="button button-label">Log out</a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class="search-bar">
                <form action="" method="GET">
                    <label>
                        <input type="text" name="search"
                               value="<?php
    
                               if (isset($_GET['search'])) {
                                   echo $_GET['search'];
    //                               $_SESSION['title'] = "search";
                               } ?>"
                               class="form-control" placeholder="search real-estate"
                        >
                    </label>
                    <button type="submit" class="search-button">
                        search
                    </button>
                </form>
            </div>
            <div class="add-announcement">
                <i class="material-symbols-rounded" style="font-size: 1em">add</i>
                add announcement
            </div>
        </header>
        <div class="filters">
            <div class="filter-bar">
                <div class="property-select">
                    <select>
                        <option value="0">Select property:</option>
                        <option value="1">Home</option>
                        <option value="2">Apartments</option>
                        <option value="3">Business premises</option>
                        <option value="4">Plot</option>
                    </select>
                </div>
                <form>
                    <input class="text-form" placeholder="minimal price">
                </form>
                <form>
                    <input class="text-form" placeholder="maximum price">
                </form>
                <form>
                    <input class="text-form" placeholder="area of property">
                </form>
                <button class="button-38 button-38-filled" role="button">Filter</button>
            </div>
        </div>
        <section class="announcements">
            <?php foreach ($announcements as $announcement):?>
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

</html>