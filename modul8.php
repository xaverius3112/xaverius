<?php
// Koneksi ke database
$host = 'localhost';
$db   = 'university';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menambahkan pengguna baru
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengedit pengguna yang ada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menghapus pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// Mengambil data pengguna
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Jika edit_id ada di URL, ambil data pengguna yang akan diedit
$edit_user = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $sql_edit = "SELECT * FROM users WHERE id='$edit_id'";
    $result_edit = $conn->query($sql_edit);
    if ($result_edit->num_rows > 0) {
        $edit_user = $result_edit->fetch_assoc(); // Ambil data pengguna yang akan diedit
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - UNIKA</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #003366;
            color: white;
            padding: 10px 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        header img {
            height: 50px;
            margin-right: 20px;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #003366;
            margin-bottom: 10px;
        }
        form label {
            font-weight: bold;
            color: #003366;
        }
        form input[type="text"], form input[type="email"], form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            background-color: #003366;
            color: white;
            border: none;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #00509e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #003366;
            color: white;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons form {
            display: inline-block;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #003366;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <img src="https://upload.wikimedia.org/wikipedia/id/b/b7/Logo_UNIKA.png" alt="UNIKA Logo">
    <h1>Manajemen Pengguna UNIKA</h1>
</header>

<div class="container">
    <h2><?php echo isset($edit_user) ? 'Edit Pengguna' : 'Tambah Pengguna'; ?></h2>
    <form method="POST" action="">
        <label for="name">Nama:</label>
        <input type="text" name="name" value="<?php echo isset($edit_user) ? $edit_user['name'] : ''; ?>" required />

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($edit_user) ? $edit_user['email'] : ''; ?>" required />

        <label for="phone">Telepon:</label>
        <input type="text" name="phone" value="<?php echo isset($edit_user) ? $edit_user['phone'] : ''; ?>" required />

        <label for="address">Alamat:</label>
        <input type="text" name="address" value="<?php echo isset($edit_user) ? $edit_user['address'] : ''; ?>" required />

        <?php if (isset($edit_user)): ?>
            <input type="hidden" name="id" value="<?php echo $edit_user['id']; ?>" />
            <input type="submit" name="update" value="Perbarui Pengguna" />
        <?php else: ?>
            <input type="submit" name="add" value="Tambah Pengguna" />
        <?php endif; ?>
    </form>
</div>

<div class="container">
    <h2>Daftar Pengguna</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td class="action-buttons">
                        <!-- Tombol Edit -->
                        <a href="?edit_id=<?php echo $row['id']; ?>">Edit</a>

                        <!-- Form Delete -->
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                            <input type="submit" name="delete" value="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');" />
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Tidak ada pengguna</td></tr>
        <?php endif; ?>
    </table>
</div>

<footer>
    &copy; 2024 Universitas Katolik Indonesia
</footer>

</body>
</html>

<?php
$conn->close(); // Menutup koneksi database
?>
