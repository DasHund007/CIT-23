<?php
$host   = "mysql";
$dbname = "wordpress";
$dbuser = "root";
$dbpass = "12345678";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("SELECT ID, user_login, user_email FROM wp_users");
    $stmt->execute();

    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: {$user['ID']} </br>
              Name: {$user['user_login']} </br>
              E-Mail: {$user['user_email']} </br><br>";
    }

} catch (PDOException $e) {
    die("❌ Fehler: " . $e->getMessage());
}