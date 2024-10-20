document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('loginButton');
    const notification = document.getElementById('notification');

    function showNotification(message, type) {
        console.log('Showing notification:', message, type);
        notification.textContent = message;
        notification.style.backgroundColor = type === 'success' ? '#4CAF50' : '#f44336';
        notification.style.display = 'block';
        
        setTimeout(() => {
            notification.style.display = 'none';
        }, 3000);
    }

    loginButton.addEventListener('click', function() {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        if (email && password) {
            const userAccounts = JSON.parse(localStorage.getItem('userAccounts')) || [];
            const user = userAccounts.find(u => u.email === email && u.password === password);

            if (user) {
                showNotification('Login berhasil!', 'success');
                // Here you can redirect to another page or perform other actions after successful login
                // For example: window.location.href = 'dashboard.html';
            } else {
                showNotification('Email atau password salah.', 'error');
            }
        } else {
            showNotification('Semua field harus diisi.', 'error');
        }
    });
});
