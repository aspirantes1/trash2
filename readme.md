1. Для начала создадим структуру базы данных для хранения пользователей, групп и их прав:

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE group_permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_id INT,
    permission VARCHAR(50) NOT NULL,
    FOREIGN KEY (group_id) REFERENCES groups(id)
);

CREATE TABLE user_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    group_id INT,
    blocked_permissions TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (group_id) REFERENCES groups(id)
);

2. Теперь создадим скрипты для добавления и удаления пользователя из группы, а также для получения списка группы и конечного набора прав для конкретного пользователя. // Файл db.php // Файл add_user_to_group.php // Файл remove_user_from_group.php // Файл get_user_permissions.php

3. Теперь создадим тесты на PHPUnit для проверки функционала: // Файл UserGroupsTest.php

4. Можно скомпоновать по классам и именным областям в ООП и добавить автолоадер, с запросами через index.php - чтобы обращаться к файлам не напрямую, а только через индексный файл.
