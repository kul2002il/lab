<?php

namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\Role;

class RoleTest extends TestCase
{
	public function testAdminCode()
	{
		$role = Role::findOne(['code' => 'admin']);
		$this->assertNotEmpty($role, 'Роль администратора не найдена.');
		return $role;
	}

	public function testSuperuser()
	{
		$role = $this->testAdminCode();
		$user = $role->getUsers()->where(['email' => 'kul.2002.il@gmail.com']);
		$this->assertNotEmpty($user, 'Ты не админ.');
	}

	public function testSaveAndDelete()
	{
		$role = new Role();
		$role->name = 'Тестовая роль без какого-либо смысла';
		$role->code = 'test';
		$this->assertTrue($role->save(), 'Роль не создаётся.');
		$this->assertSame(1, $role->delete(), 'Роль не удаляется');
	}

	public function testValidator()
	{
		$role = new Role();
		$this->assertFalse($role->validate(), 'Пустая роль считается валидной.');
		$role->name = '';
		$role->code = '';
		$this->assertFalse($role->validate(), 'Роль с пустыми строками считается валидной.');
		$role->name = '';
		$role->code = 'testEmpty';
		$this->assertFalse($role->validate(), 'Роль с пустым описанием считается валидной.');
		$role->name = 'Тест с пустым кодом роли';
		$role->code = '';
		$this->assertFalse($role->validate(), 'Роль с пустым кодом считается валидной.');
		$role->name = 'Тестовая роль без какого-либо смысла';
		$role->code = 'test';
		$this->assertTrue($role->validate(), 'Нормальная роль не считается валидной.');
	}
}

