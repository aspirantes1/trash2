<?php
// Файл UserGroupsTest.php
require 'get_user_permissions.php';

use PHPUnit\Framework\TestCase;

class UserGroupsTest extends TestCase
{
    public function testGetUserPermissions()
    {
        $_GET['user_id'] = 1;
        $expectedResult = '{"send_messages":true,"service_api":false,"debug":true}';
        $this->expectOutputString($expectedResult);
        getUserPermissions();
    }
}
?>