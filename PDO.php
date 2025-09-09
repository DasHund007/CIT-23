<?php
$host   = "mysql";
$dbname = "wordpress";
$dbuser = "root";
$dbpass = "12345678";

try {
    // Create a new PDO connection (MySQL with UTF-8 encoding)
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpass);

    // Enable exceptions for error handling (instead of silent failures)
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Run a simple SQL query to fetch all WordPress users
    $users = $dbh->query("SELECT ID, user_login, user_email FROM wp_users");

    // Loop through each user and print their details
    foreach ($users as $user) {
        echo "ID: {$user['ID']} </br>
              Username: {$user['user_login']} </br>
              Email: {$user['user_email']} </br><br>";
    }

} catch (PDOException $e) {
    // Handle connection or query errors
    die("❌ Error: " . $e->getMessage());
}