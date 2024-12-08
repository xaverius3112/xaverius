<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Contoh kredensial (dalam praktik nyata, gunakan database dan hash password)
    $valid_username = "admin";
    $valid_password = "password123";
    
    if(empty($username) || empty($password)) {
        header("Location: index.php?error=empty");
    } elseif($username == $valid_username && $password == $valid_password) {
        header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=invalid");
    }
    exit();
}
?> 