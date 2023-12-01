<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $mobileNumber = $_POST['mobileNumber'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        if (empty($fullName) || empty($email) || empty($mobileNumber) || empty($dob) || empty($gender)) {
            echo 'Error: Please fill in all fields.';
            exit;
        }

        $dsn = 'mysql:host=192.168.56.56;dbname=user_information';
        $username = 'homestead';
        $password = 'secret';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('INSERT INTO users (full_name, email, mobile_number, dob, gender) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$fullName, $email, $mobileNumber, $dob, $gender]);

            echo 'Form submitted successfully!';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo 'Error: Invalid request method.';
    }
?>
