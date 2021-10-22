<?php

namespace app\rbac\permissions;

use app\rbac\support\Permission;
use app\rbac\permissions as p;
use app\rbac\rules as rule;

class ViewOwnApparatus extends Permission
{
	public $description = 'Просмотр своего аппарата';
	
	public function children()
	{
		return [
			new p\ViewApparatus(),
		];
	}
	public function rules()
	{
		return [
			new rule\OwnApparatus,
		];
	}
}
