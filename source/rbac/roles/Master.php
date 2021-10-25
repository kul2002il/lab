<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\permissions as p;
use app\rbac\roles as r;
use app\rbac\rules as rule;

class Master extends Role
{
	public $description = 'Мастер';

	public function children()
	{
		return [
			new p\AddNews(),
			new p\EditNews(),
			new p\DeleteNews(),
			new p\ViewMasterApparatus(),
			new r\User(),
		];
	}

	public function rule()
	{
		return new rule\IsSmth();
	}
}
