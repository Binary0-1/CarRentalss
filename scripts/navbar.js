document.addEventListener("DOMContentLoaded", function() {
    // Get the current page URL
    var currentPage = window.location.pathname.split("/").pop();

    // Find the corresponding navigation item and add 'active' class
    var navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(function(item) {
        var link = item.querySelector('.nav-link');
        if (link.getAttribute('href') === currentPage) {
            item.classList.add('active');
        }
    });
});


window.onload = function() {
        var loginState = document.getElementById('loginState').value;
        var loginNavItem = document.getElementById('loginNavItem');
        var signupNavItem = document.getElementById('signupNavItem');
        var logoutNavItem = document.getElementById('logoutNavItem');
        console.log(loginState);

        if (loginState === 'true') {
            loginNavItem.style.display = 'none';
            signupNavItem.style.display = 'none';
            logoutNavItem.style.display = 'block';
        } else {
            loginNavItem.style.display = 'block';
            signupNavItem.style.display = 'block';
            logoutNavItem.style.display = 'none';
        }
    };






