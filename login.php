<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $file = 'users.json';

    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);

        foreach ($data as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                header("Location: resume.html");
                exit;
            }
        }
    }

    echo "<script>alert('Invalid login credentials!'); window.location.href='login.html';</script>";
}
?>
