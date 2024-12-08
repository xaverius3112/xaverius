<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bil1 = $_POST['bil1'];
    $bil2 = $_POST['bil2'];
    $operator = $_POST['operator'];
    
    switch($operator) {
        case '+':
            $hasil = $bil1 + $bil2;
            break;
        case '-':
            $hasil = $bil1 - $bil2;
            break;
        case '*':
            $hasil = $bil1 * $bil2;
            break;
        case '/':
            $hasil = $bil1 / $bil2;
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="text-center">Hasil Perhitungan</h2>
        <div class="alert alert-info text-center">
            <?php echo "$bil1 $operator $bil2 = $hasil"; ?>
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</body>
</html> 