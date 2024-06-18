<?php
// Файл get_user_permissions.php
include 'db.php';

// Получаем данные из запроса
$user_id = $_GET['user_id'];

// Получаем список групп пользователя
$sql = "SELECT group_id FROM user_groups WHERE user_id=$user_id";
$result = $conn->query($sql);

$groups = array();
while ($row = $result->fetch_assoc()) {
    $groups[] = $row['group_id'];
}

// Получаем права пользователя
$permissions = array();
foreach ($groups as $group_id) {
    $sql = "SELECT permission FROM group_permissions WHERE group_id=$group_id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $permissions[] = $row['permission'];
    }
}

// Получаем заблокированные права пользователя
$sql = "SELECT blocked_permissions FROM user_groups WHERE user_id=$user_id";
$result = $conn->query($sql);
$blocked_permissions = $result->fetch_assoc()['blocked_permissions'];

// Формируем конечный набор прав для пользователя
$final_permissions = array();
foreach ($permissions as $permission) {
    if (strpos($blocked_permissions, $permission) === false) {
        $final_permissions[$permission] = true;
    } else {
        $final_permissions[$permission] = false;
    }
}

echo json_encode($final_permissions);

$conn->close();
?>