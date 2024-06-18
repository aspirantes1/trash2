<?php
// Файл remove_user_from_group.php
include 'db.php';

// Получаем данные из запроса
$user_id = $_POST['user_id'];
$group_id = $_POST['group_id'];

// Удаляем пользователя из группы
$sql = "DELETE FROM user_groups WHERE user_id=$user_id AND group_id=$group_id";
if ($conn->query($sql) === TRUE) {
    echo "User removed from group successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>