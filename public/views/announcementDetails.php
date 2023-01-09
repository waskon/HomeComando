<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/myData.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>ANNOUNCEMENT DETAILS</title>
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
        <header class="wrapper">
            <h1 class="personal-data-sign">
                Title
                <!--                --><?php
                //                $announcement->getTitle();
                //                ?>
            </h1>
        </header>
        <section class="announcement">
            <div class="content">
                <img src="public/uploads/dom-wolnostojacy.jpg">
                <div class="description">
                            <span class="head">
                                Description:
                            </span>
                    <span class="head-label">
                                This is description of property
                            </span>
                </div>
                <div class="announcement-info">
                    <div class="left-tables">
                        <div class="group-column">
                            <span class="head">
                                Price
                            </span>
                            <span class="head-label">
                                100000 zł
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Number
                            </span>
                            <span class="head-label">
                                +48 987 654 321
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Property Type
                            </span>
                            <span class="head-label">
                                House
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Purpose
                            </span>
                            <span class="head-label">
                                SELL
                            </span>
                        </div>
                    </div>
                    <div class="right-tables">
                        <div class="group-column">
                            <span class="head">
                                Street
                            </span>
                            <span class="head-label">
                                Lea
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                House Number
                            </span>
                            <span class="head-label">
                                25
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Flat Number
                            </span>
                            <span class="head-label">
                                3A
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Postal Code
                            </span>
                            <span class="head-label">
                                30-456
                            </span>
                        </div>
                        <div class="group-column">
                            <span class="head">
                                Country
                            </span>
                            <span class="head-label">
                                Poland
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

<style>

    .announcement {
        display: flex;
        flex-direction: column;
        padding: 1em;
        gap: 2em;
        overflow: auto;
    }

    .announcement > div {
        background-color: #eeeeee;
        border: 1px solid gray;
        border-radius: 1em 1em 0 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .announcement > div > img {
        height: 50%;
        width: 100%;
        object-fit: cover;
        border-radius: 1em 1em 0 0;
    }

    .announcement-info {
        /*margin-bottom: 2em;*/
        display: flex;
        flex-direction: row;
        text-align: left;
    }

    .content {
        display: flex;
        flex-direction: row ;
        /*width: 100%;*/
        /*height: 100%;*/
        background-color: #C1C1C1;
    }

    .left-tables, .right-tables {
        justify-content: right;
        width: 50%;
        height: 100%;
    }

    .head {
        text-align: left;
        font: normal normal bold 30px/40px Arial;
    }
    .head-label {
        margin-left: 5em;
        margin-right: 5em;
        display: flex;
        flex-direction: row;
        background: #FFFFFF 0% 0% no-repeat padding-box;
        border: 1px solid #BCE0FD;
        border-radius: 4px;
    }

</style>
