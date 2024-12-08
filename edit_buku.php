<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape string untuk mencegah SQL injection
    $id = (int)$_POST['id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];
    
    $query = "UPDATE buku SET 
              judul='$judul', 
              pengarang='$pengarang', 
              penerbit='$penerbit', 
              tahun_terbit=$tahun_terbit 
              WHERE id=$id";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?> 