<?php
// book_session_with_sql.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $date = htmlspecialchars(trim($_POST['date']));
    $artist = htmlspecialchars(trim($_POST['artist']));

    // Basic Validation
    if (empty($name) || empty($email) || empty($date) || empty($artist)) {
        echo "All fields are required.";
        exit;
    }

    // Database Connection
    $host = 'localhost';
    $dbname = 'tattoo_shop';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert Booking into Database
        $stmt = $pdo->prepare("INSERT INTO bookings (name, email, date, artist) VALUES (:name, :email, :date, :artist)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':artist', $artist);

        if ($stmt->execute()) {
            echo "Thank you, $name! Your session has been booked with $artist on $date.";
        } else {
            echo "Sorry, there was an error saving your booking. Please try again later.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
