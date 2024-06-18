<?php
// Файл add_user_to_group.php
include 'db.php';

// Получаем данные из запроса
$user_id = $_POST['user_id'];
$group_id = $_POST['group_id'];

// Добавляем пользователя в группу
$sql = "INSERT INTO user_groups (user_id, group_id) VALUES ($user_id, $group_id)";
if ($conn->query($sql) === TRUE) {
    echo "User added to group successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>