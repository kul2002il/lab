<?php

namespace app\rbac\permissions;

use app\rbac\support\Permission;

class CreateRequest extends Permission
{
	public $description = 'Отправка запроса на ремонт аппарата.';
}
