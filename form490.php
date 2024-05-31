<?php
session_start();
include 'Library.php';

// Cek jika belum login atau bukan user yang tepat, redirect ke login
if (!isset($_SESSION['nim']) || $_SESSION['nim'] !== '2213010490') {
    header("Location: index.php");
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
    <link href="assets/css/form490.css" rel="stylesheet">
</head>

<body>
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!--  Header  -->
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
                <li><a href="index.php#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
                <li><a href="form496.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Member</span></a></li>
                <li><a href="form490.php" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Register</span></a></li>
            </ul>
        </nav>
    </header>
    <main id="main">
        <!-- disisni -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            Formulir Pendaftaran Member Perpustakaan
                        </div>
                        <div class="card-body">

                            <h1>Selamat datang, <?= $_SESSION['name'] ?></h1>
                            <p>NIM: <?= $_SESSION['nim'] ?></p>
                            <img src="<?= $_SESSION['image'] ?>" alt="Foto">
                            <a href="?action=logout">Logout</a>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK:</label>
                                    <input type="number" class="form-control" id="nik" name="nik">
                                </div>
                                <div class="form-group">
                                    <label for="usia">Usia:</label>
                                    <input type="number" class="form-control" id="usia" name="usia">
                                </div>
                                <div class="form-group">
                                    <label for="jenisKelamin">Jenis Kelamin:</label>
                                    <select name="jenisKelamin" id="jenisKelamin">
                                        <option value="" disabled selected></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                                <div class="container">
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
                                            $this->nama490 = $_POST['nama'];
                                            $this->alamat490 = $_POST['alamat'];
                                            $this->nik490 = $_POST['nik'];
                                            $this->usia490 = $_POST['usia'];
                                            $this->jenisKelamin490 = $_POST['jenisKelamin'];
                                        }

                                        protected function get_daftar490()
                                        {
                                            return
                                                "Nama : " .
                                                $this->nama490 . "<br>" .
                                                "Alamat : " .
                                                $this->alamat490 . "<br>" .
                                                "NIK : " .
                                                $this->nik490 . "<br>" .
                                                "Usia : " .
                                                $this->usia490 . "<br>" .
                                                "Jenis Kelamin : " .
                                                $this->jenisKelamin490;
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
                                    }

                                    // Check if form is submitted
                                    if ($_POST) {
                                        $tambah490 = new tambah490;
                                        echo $tambah490->get_memberbaru490();
                                    }

                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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