<?php
// Файл db.php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>