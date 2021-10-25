<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\roles as r;
use app\rbac\rules as rule;

class Superuser extends Role
{
	public $description = 'Царь сея приложения';

	public function children()
	{
		return [
			new r\Admin(),
			new r\Master(),
			new r\Manager(),
		];
	}

	public function rule()
	{
		return new rule\IsSmth();
	}
}