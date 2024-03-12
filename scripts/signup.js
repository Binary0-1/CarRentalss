

    function validatePasswords() {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (password !== confirm_password) {
            document.getElementById("passwordError").innerHTML = "Passwords do not match";
        } else {
            document.getElementById("passwordError").innerHTML = "";
        }
    }