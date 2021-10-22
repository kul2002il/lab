<?php

namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\User;
use app\models\Role;

class UserTest extends TestCase
{
	public function testSignupWithSetRoleId()
	{
		$user = User::findByUsername('test@gmail.com');
		if($user)
		{
			$user->delete();
		}
		$this->assertEmpty(
			$user,
			'Пользователь не может быть удалён.');
		$user = User::signup([
			'idRole' => 1,
			'nameFirst' => 'testFirst',
			'nameLast' => 'testLast',
			'nameMiddle' => 'testMiddle',
			'email' => 'test@gmail.com',
			'password' => '12341234',
			'password_repeat' => '12341234',
		]);
		$this->assertEmpty(
			$user->errors,
			"Установка роли при регистрации вызывает ошибку:\n" . var_export($user->errors, true));
		$this->assertNull(
			$user->idRole,
			'Установка роли при регистрации считается нормой.');
	}

	public function testOwerflow()
	{
		$user = new User([
			'nameFirst' => 'testestestestestestestestestestestestestestestestestestestestestestestestestestestestestestestes',
			'nameLast' => 'testLast',
			'nameMiddle' => 'testMiddle',
			'email' => 'test@gmail.com',
			'password' => '12341234',
			'password_repeat' => '12341234',
		]);
		$this->assertNotTrue($user->validate(), 'Переполнение считается нормой.');
	}

	public function testFindUserByUsername()
	{
		$user = User::findByUsername('kul.2002.il@gmail.com');
		$this->assertNotEmpty($user, 'Пользователь не найден.');
		$user = User::findByUsername('empty@gmail.com');
		$this->assertEmpty($user, 'Найден несуществующий пользователь.');
	}

	public function testSetRoleByCode()
	{
		$user = new User();
		$this->assertNull($user->idRole, 'Присваивается роль по умолчанию');
		$user->setRoleCode('admin');
		$this->assertSame(
			Role::findOne(['code' => 'admin'])->id,
			$user->idRole,
			'Роль устанавливается неверно или вовсе не устанавливается.');
	}
}
