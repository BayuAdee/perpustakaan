<?php
class Library {
    private $usernames = ['2213010496', '2213010490'];
    private $passwords = ['2213010496', '2213010490'];
    private $members = [
        '2213010496' => ['name' => 'Adee', 'nim' => '2213010496', 'image' => 'assets/img/ade.png'],
        '2213010490' => ['name' => 'Tatataa', 'nim' => '2213010490', 'image' => 'assets/img/okta.png']
    ];

    public function proses_login0496($username, $password) {
        if (in_array($username, $this->usernames) && in_array($password, $this->passwords) && $username === $password) {
            session_start();
            $_SESSION['name'] = $this->members[$username]['name'];
            $_SESSION['nim'] = $this->members[$username]['nim'];
            $_SESSION['image'] = $this->members[$username]['image'];
            if ($username == "2213010496") {
                header("Location: form496.php");
                exit();
            }
        }
        return "Username dan password tidak tepat.";
    }

    public function proses_login0490($username, $password) {
        if (in_array($username, $this->usernames) && in_array($password, $this->passwords) && $username === $password) {
            session_start();
            $_SESSION['name'] = $this->members[$username]['name'];
            $_SESSION['nim'] = $this->members[$username]['nim'];
            $_SESSION['image'] = $this->members[$username]['image'];
            if ($username == "2213010490") {
                header("Location: form490.php");
                exit();
            }
        }
        return "Username dan password tidak tepat.";
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

}
?>
