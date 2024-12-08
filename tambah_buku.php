<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];
    
    $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit) 
              VALUES ('$judul', '$pengarang', '$penerbit', $tahun_terbit)";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?> 