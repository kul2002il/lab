<?php

namespace app\rbac\permissions;

use app\rbac\support\Permission;
use app\rbac\permissions as p;

class ViewMasterApparatus extends Permission
{
	public $description = 'Просмотр аппарата мастером';
	
	public function children()
	{
		return [
			new p\ViewApparatus(),
		];
	}
}
