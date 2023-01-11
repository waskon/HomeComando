<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="../public/css/myData.css">
    <link rel="stylesheet" type="text/css" href="../public/css/main-page.css">
    <link rel="stylesheet" type="text/css" href="../public/css/main-styles.css">
    <link rel="stylesheet" type="text/css" href="../public/css/announcementDetails.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>ANNOUNCEMENT DETAILS</title>
</head>

<body>
<div class="base-container">
    <nav>
        <img src="../public/img/logo-czarne.png">
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
        <header class="wrapper">
            <h1 class="personal-data-sign title">
                <?php
                if (isset($announcement)) {
                    echo  $announcement->getTitle().'<br>';
                }
                ?>
            </h1>
        </header>
        <section class="announcement">
            <div class="content">
                <img src="../public/uploads/<?= $announcement->getImage() ?>">
                <div class="description">
                            <span class="head" style="margin-left: 1em ">
                                Description:
                            </span>
                    <span class="head-label">
<!--                                This is description of property-->
                        <?php echo $announcement->getDescription().'<br>'; ?>
                    </span>
                </div>
                <div class="announcement-info">
                    <div class="left-tables">
                        <div class="group-column">
                            <span class="head">
                                Price
                            </span>
                            <span class="head-label">
                                <?php echo $announcement->getPrice(); ?>
                                zł
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Number
                            </span>
                            <span class="head-label">
<!--                                +48 987 654 321-->
                                <?php echo $announcement->getPhoneNumber().'<br>'; ?>
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Property Type
                            </span>
                            <span class="head-label">
<!--                                House-->
                                <?php echo $announcement->getPropertyType().'<br>'; ?>
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Purpose
                            </span>
                            <span class="head-label">
<!--                                SELL-->
                                <?php echo $announcement->getPurpose().'<br>'; ?>
                            </span>
                        </div>
                    </div>
                    <div class="right-tables">
                        <div class="group-column">
                            <span class="head">
                                Street
                            </span>
                            <span class="head-label">
<!--                                Lea-->
                                <?php
                                if (isset($address)) {
                                    echo  $address->getStreet().'<br>';
                                }
                                ?>
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                House Number
                            </span>
                            <span class="head-label">
                                <?php echo  $address->getHouseNumber().'<br>'; ?>
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Flat Number
                            </span>
                            <span class="head-label">
                                <?php echo  $address->getFlatNumber().'<br>'; ?>
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Postal
                            </span>
                            <span class="head-label">
                                <?php echo  $address->getPostalCode().'';
                                echo "\t";
                                echo  $address->getCity().'<br>'; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
