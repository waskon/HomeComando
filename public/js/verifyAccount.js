// import authorization from SecurityController.php
const verify_otp = async () => {
    let otp = document.getElementById('otp').value;
    fetch('../../verify.php?otp=' + otp)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            if (data.result == true) {
                return window.location.href="http://localhost:8080/mainPage";
            } else {
                alert("Invalid One Time Password");
                return false;
            }
        });
}