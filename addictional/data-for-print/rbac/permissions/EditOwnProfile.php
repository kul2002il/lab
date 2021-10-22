<?php

namespace app\rbac\permissions;

use app\rbac\support\Permission;
use app\rbac\permissions as p;

class EditOwnProfile extends Permission
{
	public $description = 'Редактирование собственного профиля пользователя';

	public function children()
	{
		return [
			new p\EditProfile(),
		];
	}
}
