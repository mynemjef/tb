function toggle_visibility() {
    var visibility_button = document.getElementById("password_field");
    if (visibility_button.type === "password") {
        visibility_button.type = "text";
    } else {
        visibility_button.type = "password";
    }
}