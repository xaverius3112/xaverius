document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signupForm');
    const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];

    // Function to update the user table
    function updateUserTable() {
        let users = JSON.parse(localStorage.getItem('users')) || [];
        userTable.innerHTML = ''; // Clear existing rows

        users.forEach((user, index) => {
            let row = userTable.insertRow();
            row.insertCell(0).textContent = user.name;
            row.insertCell(1).textContent = user.nim;
            row.insertCell(2).textContent = user.email;
            
            let actionsCell = row.insertCell(3);
            let editBtn = document.createElement('button');
            editBtn.textContent = 'Edit';
            editBtn.className = 'btn btn-sm btn-primary mr-2';
            editBtn.onclick = () => editUser(index);
            
            let deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'btn btn-sm btn-danger';
            deleteBtn.onclick = () => deleteUser(index);
            
            actionsCell.appendChild(editBtn);
            actionsCell.appendChild(deleteBtn);
        });
    }

    // Function to edit a user
    function editUser(index) {
        let users = JSON.parse(localStorage.getItem('users')) || [];
        let user = users[index];
        
        document.getElementById('name').value = user.name;
        document.getElementById('nim').value = user.nim;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = user.password;
        
        // Change submit button to update
        let submitBtn = document.querySelector('#signupForm button[type="submit"]');
        submitBtn.textContent = 'Update User';
        submitBtn.onclick = function(e) {
            e.preventDefault();
            users[index] = {
                name: document.getElementById('name').value,
                nim: document.getElementById('nim').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            };
            localStorage.setItem('users', JSON.stringify(users));
            updateUserTable();
            signupForm.reset();
            submitBtn.textContent = 'Sign Up';
            submitBtn.onclick = null; // Remove this custom onclick
        };
    }

    // Function to delete a user
    function deleteUser(index) {
        if (confirm('Are you sure you want to delete this user?')) {
            let users = JSON.parse(localStorage.getItem('users')) || [];
            users.splice(index, 1);
            localStorage.setItem('users', JSON.stringify(users));
            updateUserTable();
        }
    }

    // Call updateUserTable on page load
    updateUserTable();

    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const nim = document.getElementById('nim').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Create user object
        const user = {
            name: name,
            nim: nim,
            email: email,
            password: password
        };

        // Get existing users or initialize empty array
        let users = JSON.parse(localStorage.getItem('users')) || [];

        // Check if user already exists
        const existingUser = users.find(u => u.email === email || u.nim === nim);
        if (existingUser) {
            alert('A user with this email or NIM already exists!');
            return;
        }

        // Add new user
        users.push(user);

        // Save updated users array to localStorage
        localStorage.setItem('users', JSON.stringify(users));

        alert('Sign up successful! You can now log in.');
        signupForm.reset();

        // Update the user table
        updateUserTable();
    });
});
