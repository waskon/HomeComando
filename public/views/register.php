<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/register.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css"/>
    <title>REGISTRY</title>
</head>

<body>
<div class="login-container">
    <div class="login-wrapper">
        <div class="visiting-background flex-center">
            <div class="visiting-card">
                <img style="width: 20rem;" src="public/img/logo-czarne.png" alt="">
            </div>
        </div>
        <form class="register" action="register" method="POST">
            <div class="registry-panel">
                <div class="credential-wrapper ">
                    <div class="registry-label ">
                        <span class="login-label"> Name </span>
                        <input name="name" class="text-form" type="text">
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Surname </span>
                        <input name="surname" class="text-form" type="text">
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Country </span>
                        <input name="country" class="text-form" type="text">
                    </div>
                </div>
                <div class="credential-wrapper">
                    <div class="registry-label flex-column">
                        <span class="login-label"> E-mail </span>
                        <input name="email" class="text-form" type="text">
                    </div>
                    <div class="registry-label ">
                        <span class="login-label"> Password </span>
                        <input name="password" class="text-form" type="text">
                    </div>
                    <div class="registry-label">
                        <span class="login-label"> Repeat password </span>
                        <input name="repeatPassword" class="text-form" type="text">
                    </div>
                </div>

                <div class="messages" style="color: red">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="buttons-wrapper flex-column flex-center">
                    <button class="button-38 button-38-filled" role="button" type="submit">Sign in</button>
                </div>
        </form>
        <div class="back-button">
            <a href="/login">
                <button class="button-38" role="button">Back to log in page</button>
            </a>
        </div>
    </div>
</div>
</div>
</body>

</html>
