<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

    $file = 'users.json';
    $data = [];

    // Read existing data
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
    }

    // Check if email already exists
    foreach ($data as $existingUser) {
        if ($existingUser['email'] === $email) {
            echo "<script>alert('Email already registered!'); window.location.href='register.html';</script>";
            exit;
        }
    }

    // Add new user
    $data[] = $user;
    file_put_contents($file, json_encode($data));

    // Redirect to login page
    echo "<script>alert('Registration successful! Please login.'); window.location.href='login.html';</script>";
}
?>
