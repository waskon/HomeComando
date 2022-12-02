<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="public/css/register.css" /> -->
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css" />
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
            <div class="registry-panel">
                <div class="credential-wrapper flex-column">
                    <div class="registry-label flex-column">
                        <span class="login-label"> Name </span>
                        <input class="text-form" type="text"></form>
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Surname </span>
                        <input class="text-form" type="text"></form>
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> E-mail </span>
                        <input class="text-form" type="text"></form>
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Country </span>
                        <input class="text-form" type="text"></form>
                    </div>
                </div>
            </div>
            <div class="registry-panel">
                <div class="credential-wrapper flex-column">
                    <div class="login-label flex-column">
                        <span class="login-label"> Login </span>
                        <input class="text-form" type="text"></form>
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Password </span>
                        <input class="text-form" type="text"></form>
                    </div>
                    <div class="registry-label flex-column">
                        <span class="login-label"> Repeat password </span>
                        <input class="text-form" type="text"></form>
                    </div>
                </div>
                <div class="buttons-wrapper flex-column flex-center">
                    <button class="button-38 button-38-filled" role="button">Sign in</button>
                    <button class="button-38" role="button">Back to log in page</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    body {
        margin: 0;
        padding: 0 2rem;
    }

    .login-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        width: 100%;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }

    .login-wrapper {
        display: flex;
        flex-direction: row;
        width: 60rem;
        height: 30rem;
        border: 0.5px solid rgb(204, 204, 204);
        -webkit-box-shadow: 1px 6px 6px -2px rgba(66, 68, 90, 1);
        -moz-box-shadow: 1px 6px 6px -2px rgba(66, 68, 90, 1);
        box-shadow: 1px 6px 6px -2px rgba(66, 68, 90, 1);
    }

    .registry-panel {
        display: flex;
        flex-direction: column;
        padding: 2rem 1rem;
        width: 30%;
    }

    .visiting-card {
        background-color: #eeeeee !important;
        margin-left: 1em;
        margin-right: 1em;
    }

    .visiting-background {
        background-color: #eeeeee !important;
    }

    .logo-wrapper {
        height: 50%;
    }

    .buttons-wrapper {
        width: 100%;
        margin-top: 1rem;
        gap: 1rem;
    }

    .login-label {
        font-size: 1.1rem;
        color: rgb(99, 98, 98);
        letter-spacing: 1px;
        margin-bottom: 0.2rem;
    }

    @media (max-width: 900px) {
        .login-wrapper {
            flex-direction: column;
            width: 45rem;
            height: 40rem;
        }

        .login-image,
        .login-panel {
            width: 100%;
            height: 50%;
        }
    }
</style>