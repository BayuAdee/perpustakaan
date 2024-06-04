<?php
session_start();
include 'Library.php';

// Cek jika belum login atau bukan user yang tepat, redirect ke login
if (!isset($_SESSION['nim']) || $_SESSION['nim'] !== '2213010490') {
    header("Location: login.php");
    exit;
}

// Proses logout jika diminta
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $library = new Library();
    $library->logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Perpustakaan Surakarta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/form496.css" rel="stylesheet">
</head>

<body>
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!--  Header  -->
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="group6.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
                <li><a href="group6.php#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
                <li><a href="form496.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Member</span></a></li>
                <li><a href="form490.php" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Register</span></a></li>
            </ul>
        </nav>
    </header>
    <main id="main">
        <div class="kotak">
            <div class="kiri">
                <div class="text-center mt-4 name">
                    Formulir Pendaftaran Member Perpustakaan
                </div>
                <form class="p-3 mt-3" method="post" action="">
                    <div class="form-field d-flex align-items-center">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama490">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat490">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <label for="nik">NIK:</label>
                        <input type="number" class="form-control" id="nik" name="nik490">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <label for="usia">Usia:</label>
                        <input type="number" class="form-control" id="usia" name="usia490">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <label for="jenisKelamin">Jenis Kelamin:</label>
                        <select name="jenisKelamin490" id="jenisKelamin">
                            <option value="" disabled selected></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn mt-3" name="submit">Submit</button>
                </form>
                <div class="text-center fs-6">
                    <a href="group6.php">Kembali ke Beranda</a>
                </div>

                <?php

                class daftar490
                {
                    protected $nama490;
                    protected $alamat490;
                    protected $nik490;
                    protected $usia490;
                    protected $jenisKelamin490;

                    public function __construct()
                    {
                        $this->nama490 = $_POST['nama490'];
                        $this->alamat490 = $_POST['alamat490'];
                        $this->nik490 = $_POST['nik490'];
                        $this->usia490 = $_POST['usia490'];
                        $this->jenisKelamin490 = $_POST['jenisKelamin490'];
                    }

                    protected function get_daftar490()
                    {
                        return
                            "Nama : " . $this->nama490 . "<br>" .
                            "Alamat : " . $this->alamat490 . "<br>" .
                            "NIK : " . $this->nik490 . "<br>" .
                            "Usia : " . $this->usia490 . "<br>" .
                            "Jenis Kelamin : " . $this->jenisKelamin490;
                    }
                }

                class tambah490 extends daftar490
                {
                    public function get_memberbaru490()
                    {
                        $arraynama = array("1" => "ade", "2" => "okta", "3" => "tata");

                        $index = array_search($this->nama490, $arraynama);
                        if ($index !== false) {
                            echo '<div class="alert alert-warning" role="alert">Data sudah terdaftar</div>';
                        } else {
                            $arraynama[] = $this->nama490;

                            // Output array contents
                            echo '<div class="alert alert-success" role="alert">';
                            foreach ($arraynama as $key => $value) {
                                echo "Index: " . $key . ", Value: " . $value . "<br>";
                            }
                            echo '</div>';
                        }
                    }

                    public static function __callStatic($name, $arguments)
                    {
                        if ($name === 'tambahMemberBaru') {
                            $nama = $arguments[0];
                            $usia = $arguments[1];

                            if ($usia >= 18) {
                                return "Member baru dengan nama $nama dan usia $usia telah berhasil ditambahkan.";
                            } else {
                                return "Pendaftaran gagal. $nama belum cukup usia.";
                            }
                        } else {
                            return "Method $name tidak ditemukan.";
                        }
                    }
                }

                // Check if form is submitted
                if ($_POST) {
                    $tambah490 = new tambah490;
                    echo $tambah490->get_memberbaru490();

                    // Mengakses method yang tidak dideklarasikan secara eksplisit
                    $nama = $_POST['nama490'];
                    $usia = $_POST['usia490'];
                    $result = tambah490::tambahMemberBaru($nama, $usia);
                    echo '<div class="alert alert-info" role="alert">' . $result . '</div>';
                }

                ?>

            </div>
            <div class="kanan">
                <div class="foto">
                    <img src="<?= $_SESSION['image'] ?>" alt="Foto">
                    <!-- <img src="/assets/img/book.jpeg" alt=""> -->
                    <!-- <img src="assets/img/ade.png" alt="Ade"> -->
                </div>
                <!-- Konten tambahan di sini (bisa berupa gambar atau teks lain) -->
                <div class="content-right">
                    <!-- Tambahkan konten lain di sini -->
                    <h2>Selamat Datang, <?= $_SESSION['name'] ?>!!</h2>
                    <p>NIM : <?= $_SESSION['nim'] ?></p>
                    <!-- <a href="?action=logout">Logout</a> -->
                    <button type="button" class="btn btn-primary"><a href="?action=logout" class="text-light">Logout</a></button>
                    <!-- <button class="btn mt-3" type="button"><a href="?action=logout">Logout</a></button> -->
                </div>
            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="container">
            <h3>Perpustakaan Kota Surakarta</h3>
            <p>"Pendidikan adalah proses di mana kita memperoleh pengetahuan, pikiran yang terbuka, dan pemahaman yang dalam." - John F. Kennedy</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Perpustakaan Kota Surakarta</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <a>Made On Earth By Humans</a>
            </div>
        </div>
    </footer>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<style>
    body {
        width: 100%;
        height: 100vh;
        background-image: url('assets/img/book.jpeg');
        background-size: cover;
        position: relative;
    }
</style>