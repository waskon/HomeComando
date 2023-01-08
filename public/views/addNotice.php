<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/add-notice.css">
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>ADD NOTICE</title>
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
                    Upload
                </h1>
            </header>
            <section class="notice-form">
                <form action="addNotice" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>

                    <input class="title" name="title" type="text" placeholder="title">
                    <textarea name="description" rows=5 placeholder="description"></textarea>
                    <div class="details">
                        <input class="price-form" name="price" type="text" placeholder="price">
                        <text>zł</text>
                        <input class="measurement-form" name="size" type="text" placeholder="measurement">
                        <text>m2</text>
                    </div>
                    <input type="file" name="file" /><br />
                    <textarea name="phone-number" rows=1 placeholder="phone number"></textarea>
                    <div class="property-select type">
                        <select id="type" class="form-control">
                            <option value="">Select property type:</option>
                            <option value="Home">Home</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Business premises">Business premises</option>
                            <option value="Plot">Plot</option>
                            <option value="Garage">Garage</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="purpose type">
                        <select id="type" class="form-control">
                            <option value="">Select purpose:</option>
                            <option value="Sell">Sell</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>

</html>

<style>

</style>