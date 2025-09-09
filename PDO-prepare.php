<?php
$host   = "mysql";
$dbname = "wordpress";
$dbuser = "root";
$dbpass = "12345678";

try {
    // Create a new PDO connection (MySQL with UTF-8 encoding)
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpass);

    // Enable exceptions for error handling
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement (safer than query, supports parameters)
    $stmt = $dbh->prepare("SELECT ID, user_login, user_email FROM wp_users");

    // Execute the prepared statement
    $stmt->execute();

    // Fetch results row by row as an associative array
    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: {$user['ID']} </br>
              Username: {$user['user_login']} </br>
              Email: {$user['user_email']} </br><br>";
    }

} catch (PDOException $e) {
    // Handle connection or query errors
    die("❌ Error: " . $e->getMessage());
}