const passField = document.getElementById("pass_field");
const passShowIcon = document.getElementById("pass_show_icon");

var isPasswordShown = false

function showPassword() {
    passShowIcon.classList.toggle("fa-eye");
    passShowIcon.classList.toggle("fa-eye-slash");

    isPasswordShown = !isPasswordShown;

    if (isPasswordShown) {
        passField.type = "text";
    } else {
        passField.type = "password";
    }
}