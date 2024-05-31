<?php
session_start();
include 'Library.php';

// Cek jika belum login atau bukan user yang tepat, redirect ke login
if (!isset($_SESSION['nim']) || $_SESSION['nim'] !== '2213010496') {
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
        <div class="container mt-5">
            <div class="row justify-content-center bg">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center fs-4">
                            Cek Member
                        </div>
                        <div class="card-body">
                            <h1>Selamat datang, <?= $_SESSION['name'] ?></h1>
                            <p>NIM: <?= $_SESSION['nim'] ?></p>
                            <img src="<?= $_SESSION['image'] ?>" alt="Foto">
                            <a href="?action=logout">Logout</a>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama496">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat496">
                                </div>
                                <div class="form-group">
                                    <label for="nomorTelepon">Nomor Telepon:</label>
                                    <input type="number" class="form-control" id="nomorTelepon" name="nomorTelepon496">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email496">
                                </div>
                                <div class="form-group">
                                    <label for="statusKeanggotaan">Status Keanggotaan:</label>
                                    <select name="statusKeanggotaan496" id="statusKeanggotaan" class="form-control">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="Punya Membership">Punya Membership</option>
                                        <option value="Tidak Punya Membership">Tidak Punya Membership</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                                <?php
                                // Membuat class Member dengan konstruktor dan minimal 5 property
                                class Member496
                                {
                                    protected $nama496;
                                    protected $alamat496;
                                    protected $nomorTelepon496;
                                    protected $email496;
                                    protected $statusKeanggotaan496;

                                    public function __construct($nama, $alamat, $nomorTelepon, $email, $statusKeanggotaan)
                                    {
                                        $this->nama496 = $nama;
                                        $this->alamat496 = $alamat;
                                        $this->nomorTelepon496 = $nomorTelepon;
                                        $this->email496 = $email;
                                        $this->statusKeanggotaan496 = $statusKeanggotaan;
                                    }

                                    protected function searchData($dataArray, $keyword)
                                    {
                                        $index = array_search($keyword, $dataArray);
                                        if ($index !== false) {
                                            echo '<div class="alert alert-success" role="alert" style="margin-top: 30px; margin-bottom: 10px">';
                                            echo "Data ditemukan:<br>";
                                            echo "Nama: " . $dataArray['nama496'] . "<br>";
                                            echo "Alamat: " . $dataArray['alamat496'] . "<br>";
                                            echo "Status Keanggotaan: " . $dataArray['statusKeanggotaan496'] . "<br>";
                                            echo '</div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert" style="margin-top: 30px; margin-bottom: 10px">';
                                            echo "Data tidak ditemukan.";
                                            echo '</div>';
                                        }
                                    }

                                    public function processFormData($formData)
                                    {
                                        // Memanggil searchData dari dalam kelas
                                        $this->searchData($formData, $formData['nama496']);
                                    }
                                }

                                class PremiumMember extends Member496
                                {
                                    public function showPremiumInfo()
                                    {
                                        $nama = array('ade', 'okta');
                                        $index = array_search($this->nama496, $nama);
                                        if ($index !== false) {
                                            return "Data sudah pernah dimasukkan.";
                                        } else {
                                            $nama[] = $this->nama496;
                                            return $nama;
                                        }
                                    }

                                    public static function __callStatic($name, $arguments)
                                    {
                                        if ($name == 'checkMembership') {
                                            $nama = $arguments[0];
                                            $status = $arguments[1];

                                            if ($status == "Premium") {
                                                echo '<div class="alert alert-info" role="alert">';
                                                echo "Member $nama memiliki status keanggotaan Premium.";
                                                echo '</div>';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">';
                                                echo "Member $nama memiliki status keanggotaan Reguler.";
                                                echo '</div>';
                                            }
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">';
                                            echo "Method $name tidak ditemukan.";
                                            echo '</div>';
                                        }
                                    }
                                }

                                // Proses form
                                if (isset($_POST['submit'])) {
                                    $nama = $_POST['nama496'];
                                    $alamat = $_POST['alamat496'];
                                    $nomorTelepon = $_POST['nomorTelepon496'];
                                    $email = $_POST['email496'];
                                    $statusKeanggotaan = $_POST['statusKeanggotaan496'];

                                    if ($statusKeanggotaan == "Punya Membership") {
                                        $membershipLevel = "Premium";
                                        $premiumMember = new PremiumMember($nama, $alamat, $nomorTelepon, $email, $statusKeanggotaan, $membershipLevel);
                                        $data = $premiumMember->showPremiumInfo();
                                        if (is_array($data)) {
                                            echo '<div class="alert alert-success" role="alert">';
                                            echo "Data berhasil dimasukkan:<br>";
                                            foreach ($data as $key) {
                                                echo $key . "<br>";
                                            }
                                            echo '</div>';
                                        } else {
                                            echo '<div class="alert alert-warning" role="alert">';
                                            echo $data;
                                            echo '</div>';
                                        }
                                    } else {
                                        // Check apakah variabel $premiumMember sudah didefinisikan sebelumnya
                                        if (isset($premiumMember)) {
                                            // Jika sudah didefinisikan, gunakan
                                            $premiumMember->processFormData($_POST);
                                        } else {
                                            // Jika belum didefinisikan, buat objek Member biasa
                                            $member = new Member496($nama, $alamat, $nomorTelepon, $email, $statusKeanggotaan);
                                            $member->processFormData($_POST);
                                        }
                                    }

                                    // Memanggil method statis menggunakan overloading
                                    PremiumMember::checkMembership($nama, $statusKeanggotaan);
                                }
                                ?>
                            </form>
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