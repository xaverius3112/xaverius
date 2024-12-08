<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="bg-light">
        <div class="container">
            <div class="row align-items-center d-flex">
                <div class="col-md-2 d-flex align-items-center">
                    <img src="images/logo.png" alt="Logo Perpustakaan" class="img-fluid" style="max-width: 50px; height: auto;">
                    <span class="ml-2" style="color: black; font-family: 'Roboto', sans-serif;">Perpustakaan UNIKA</span>
                </div>
                <div class="col-md-10">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="profile.html">Profil</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#layanan" id="layananDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan Kami</a>
                                    <div class="dropdown-menu" aria-labelledby="layananDropdown">
                                        <a class="dropdown-item" href="daftaranggota.html">Daftar Anggota</a>
                                        <a class="dropdown-item" href="tabelbuku.html">Tabel Buku</a>
                                        <a class="dropdown-item" href="pengembalian.html">Pengembalian</a>
                                        <a class="dropdown-item" href="peminjaman.html">Peminjaman</a>
                                        <a class="dropdown-item" href="pemesananbuku.html">Pemesanan Buku</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#Modul" id="modulDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modul</a>
                                    <div class="dropdown-menu" aria-labelledby="modulDropdown">
                                        <a class="dropdown-item" href="modul1.html">Modul 1</a>
                                        <a class="dropdown-item" href="modul2.html">Modul 2</a>
                                        <a class="dropdown-item" href="modul3.html">Modul 3</a>
                                        <a class="dropdown-item" href="modul4.html">Modul 4</a>
                                        <a class="dropdown-item" href="modul5.html">Modul 5</a>
                                        <a class="dropdown-item" href="modul6.html">Modul 6</a>
                                        <a class="dropdown-item" href="http://localhost/xav/">Modul 7</a>
                                        <a class="dropdown-item" href="http://localhost/xav/">Modul 8</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#Log In" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
                                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                                        <a class="dropdown-item" href="login.html">Login</a>
                                        <a class="dropdown-item" href="register.html">Register</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-5 py-4" style="margin-top: 6rem !important;">
    <!-- Task 1: List 1-1000 -->
    <div class="card mb-4 bg-primary text-white box-container">
        <div class="card-body">
            <h3 class="card-title"><i class="fas fa-list"></i> Daftar Hari Belajar PHP</h3>
            <div class="scrollable-box">
                <?php
                for($i = 1; $i <= 1000; $i++) {
                    echo "<p class='m-0 list-item'>$i. Ini adalah hari ke-$i belajar PHP</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Task 2 & 3: Calculator -->
    <div class="card mb-4 bg-success text-white box-container">
        <div class="card-body">
            <h3 class="card-title"><i class="fas fa-calculator"></i> Kalkulator</h3>
            <div class="form-box">
                <form action="hitung.php" method="post">
                    <div class="mb-3">
                        <input type="number" class="form-control calc-input" name="bil1" placeholder="Bilangan Pertama" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-control calc-input" name="operator" required>
                            <option value="+">Penjumlahan (+)</option>
                            <option value="-">Pengurangan (-)</option>
                            <option value="*">Perkalian (*)</option>
                            <option value="/">Pembagian (/)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control calc-input" name="bil2" placeholder="Bilangan Kedua" required>
                    </div>
                    <button type="submit" class="btn btn-light">Hitung</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Task 4: Login Form -->
    <div class="card mb-4 bg-info text-white box-container">
        <div class="card-body">
            <h3 class="card-title"><i class="fas fa-user-lock"></i> Login</h3>
            <div class="form-box">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control login-input" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control login-input" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-light">Login</button>
                </form>
                <?php
                if(isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if($error == 'empty') {
                        echo '<div class="alert alert-warning mt-3">Input tidak lengkap!</div>';
                    } elseif($error == 'invalid') {
                        echo '<div class="alert alert-danger mt-3">Username atau password salah!</div>';
                    }
                } elseif(isset($_GET['success'])) {
                    echo '<div class="alert alert-success mt-3">Login berhasil!</div>';
                }
                ?>
            </div>
        </div>
        
    </div>
    
    <!-- Task 5: CRUD Form -->
    <div class="card mb-4 bg-warning text-dark box-container">
        <div class="card-body">
            <h3 class="card-title"><i class="fas fa-database"></i> Data Management</h3>
            <div class="form-box">
                <?php
                // Tampilkan pesan sukses/error jika ada
                if(isset($_SESSION['message'])) {
                    echo "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show'>
                            {$_SESSION['message']}
                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                          </div>";
                    unset($_SESSION['message']);
                    unset($_SESSION['msg_type']);
                }
                ?>
                
                <form action="process_data.php" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required
                               value="<?php echo isset($_GET['nama']) ? $_GET['nama'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required
                               value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" name="telepon" placeholder="Nomor Telepon" required
                               value="<?php echo isset($_GET['telepon']) ? $_GET['telepon'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="alamat" placeholder="Alamat" required><?php echo isset($_GET['alamat']) ? $_GET['alamat'] : ''; ?></textarea>
                    </div>
                    <div class="btn-group">
                        <?php if(isset($_GET['edit'])): ?>
                            <button type="submit" name="action" value="update" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        <?php else: ?>
                            <button type="submit" name="action" value="tambah" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        <?php endif; ?>
                    </div>
                </form>

                <!-- Tabel Data -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'config.php';
                            $stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>{$row['nama']}</td>";
                                echo "<td>{$row['email']}</td>";
                                echo "<td>{$row['telepon']}</td>";
                                echo "<td>{$row['alamat']}</td>";
                                echo "<td>
                                        <a href='index.php?edit={$row['id']}&nama={$row['nama']}&email={$row['email']}&telepon={$row['telepon']}&alamat={$row['alamat']}' 
                                           class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a>
                                        <a href='process_data.php?delete={$row['id']}' 
                                           class='btn btn-sm btn-danger' 
                                           onclick='return confirm(\"Yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i></a>
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
    <section class="bg-light text-center py-3" style="margin-top: 40px;">   
        
        <footer class="bg-light text-center py-3" style="margin-top: 20px;">
            <p>Copyright © 2022 — Made with 💛 Perpustakaan Universitas Katolik Santo Thomas</p>
        </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
