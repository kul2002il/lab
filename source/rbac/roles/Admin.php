<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\permissions as p;
use app\rbac\roles as r;
use app\rbac\rules as rule;

class Admin extends Role
{
	public $description = 'Администратор системы';

	public function children()
	{
		return [
			new p\AddNews(),
			new p\EditNews(),
			new p\DeleteNews(),
			new r\User(),
		];
	}

	public function rule()
	{
		return new rule\IsSmth();
	}
}