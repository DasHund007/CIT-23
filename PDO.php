<?php
$host   = "mysql";
$dbname = "wordpress";
$dbuser = "root";
$dbpass = "12345678";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $users = $dbh->query("SELECT ID, user_login, user_email FROM wp_users");

    foreach ($users as $user) {
        echo "ID: {$user['ID']} </br>
              Name: {$user['user_login']} </br>
              E-Mail: {$user['user_email']} </br><br>";
    }
} catch (PDOException $e) {
    die("❌ Fehler: " . $e->getMessage());
}