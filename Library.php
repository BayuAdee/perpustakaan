<?php
class Library {
    private $usernames = ['2213010496', '2213010490'];
    private $passwords = ['2213010496', '2213010490'];
    private $members = [
        '2213010496' => ['name' => 'Adee', 'nim' => '2213010496', 'image' => 'path/to/imageA.jpg'],
        '2213010490' => ['name' => 'Tatata', 'nim' => '2213010490', 'image' => 'path/to/imageB.jpg']
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
            } elseif ($username == "2213010490") {
                header("Location: form490.php");
                exit();
            }
        } else {
            echo "Username dan password tidak tepat.";
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }

    // public static function __callStatic($name, $arguments) {
    //     if ($name === 'overloadedMethod') {
    //         if ($arguments[0] === 'someCondition') {
    //             echo "Condition met!";
    //         } else {
    //             echo "Condition not met!";
    //         }
    //     }
    // }
}
?>
