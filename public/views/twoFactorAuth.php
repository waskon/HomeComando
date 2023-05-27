<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '/var/www/html/vendor/autoload.php';
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
$_g2fa = new Google2FA();
$user = new stdClass();
$user->google2fa_secret = $_g2fa->generateSecretKey();
$user->email = '22konradwas22@gmail.com';
$_SESSION['g2fa_user'] = $user;
$app_name = 'Home Comando';
$qrCodeUrl = $_g2fa->getQRCodeUrl(
    $app_name,
    $user->email,
    $user->google2fa_secret
);
$renderer = new ImageRenderer(
    new RendererStyle(250),
    new ImagickImageBackEnd()
);
$writer = new Writer($renderer);
$writer->writeFile($qrCodeUrl, 'qrcode.png');
$encoded_qr_data = base64_encode($writer->writeString($qrCodeUrl));
$current_otp = $_g2fa->getCurrentOtp($user->google2fa_secret);
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/main-styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/twoFactorAuth.css">

    <script src="https://kit.fontawesome.com/70da13af9d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/verifyAccount.js" defer></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>Two Factor Authentication</title>
</head>

<body>
<div class="login-container">
    <div class="login-wrapper">
        <div class="login-image">

            <img class="qr-code" src="data:image/png;base64,<?= $encoded_qr_data; ?>" alt="QR Code">
        </div>
        <form class="login-panel">
            <div class="logo-wrapper flex-center">
                <h1 class="personal-data-sign" style="text-align: center;">
                    Scan QR code and verify your account in Google Authenticator
                </h1>
            </div>
            <div style="width: 50%; margin:10px auto;" class="label3">
                <span class="login-label"> Enter your code: </span>
                <input class="text-form" name="otp" id="otp" type="number" placeholder="Code" required>
            </div>
            <input class="verify-button button-38 button-38-filled " type="button" value="Verify"
                   onclick="verify_otp();"/>
        </form>
    </div>
</div>
</body>