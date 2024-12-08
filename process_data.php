<?php
session_start();
require_once 'config.php';

// Fungsi untuk set pesan
function setMessage($message, $type) {
    $_SESSION['message'] = $message;
    $_SESSION['msg_type'] = $type;
}

// Tambah Data
if(isset($_POST['action']) && $_POST['action'] == 'tambah') {
    try {
        $stmt = $pdo->prepare("INSERT INTO users (nama, email, telepon, alamat) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['nama'], $_POST['email'], $_POST['telepon'], $_POST['alamat']]);
        setMessage("Data berhasil ditambahkan!", "success");
    } catch(PDOException $e) {
        setMessage("Error: " . $e->getMessage(), "danger");
    }
    header("Location: index.php");
    exit();
}

// Update Data
if(isset($_POST['action']) && $_POST['action'] == 'update') {
    try {
        $stmt = $pdo->prepare("UPDATE users SET nama=?, email=?, telepon=?, alamat=? WHERE id=?");
        $stmt->execute([$_POST['nama'], $_POST['email'], $_POST['telepon'], $_POST['alamat'], $_POST['id']]);
        setMessage("Data berhasil diupdate!", "success");
    } catch(PDOException $e) {
        setMessage("Error: " . $e->getMessage(), "danger");
    }
    header("Location: index.php");
    exit();
}

// Hapus Data
if(isset($_GET['delete'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$_GET['delete']]);
        setMessage("Data berhasil dihapus!", "success");
    } catch(PDOException $e) {
        setMessage("Error: " . $e->getMessage(), "danger");
    }
    header("Location: index.php");
    exit();
}

header("Location: index.php");
?>