document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const loginButton = document.getElementById('loginButton');

    loginButton.addEventListener('click', function(e) {
        e.preventDefault();
        
        const email = emailInput.value;
        const password = passwordInput.value;

        // Get users from localStorage
        const users = JSON.parse(localStorage.getItem('users')) || [];

        // Find user with matching email and password
        const user = users.find(u => u.email === email && u.password === password);

        if (user) {
            // Login successful
            alert('Login successful!');
            // You can redirect to another page or perform other actions here
            // For example: window.location.href = 'dashboard.html';
        } else {
            // Login failed
            alert('Login failed. Please check your email and password.');
        }

        // Clear the form
        loginForm.reset();
    });
});

