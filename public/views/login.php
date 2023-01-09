<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/login-page.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css"/>
    <title>Home Commando</title>
</head>

<body>
<div class="login-container">
    <div class="login-wrapper">
        <div class="login-image"></div>
        <div class="login-panel">
            <div class="logo-wrapper flex-center">
                <img style="width: 10rem;" src="public/img/logo-czarne.png" alt="">
            </div>
            <form class="login" action="login" method="POST">
                <div class="credential-wrapper flex-column">
                    <div class="login-label flex-column">
                        <div class="messages" style="color: red">
                            <?php
                                if (isset($messages)) {
                                    foreach ($messages as $message) {
                                        echo $message;
                                    }
                                }
                                ?>
                        </div>
                        <span class="login-label"> Login </span>
                        <input name="email" class="text-form" type="text" placeholder="email@email.com">
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Password </span>
                        <input name="password" type="password" class="text-form" placeholder="password">
                    </div>
                </div>
                <div class="buttons-wrapper flex-row flex-center">
                    <button class="button-38" role="button" type="submit">Log in</button>
                </div>
            </form>
            <div class="register-button">
                <a href="/register">
                    <button class="button-38 button-38-filled" role="button">Sign in</button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>

</html>
