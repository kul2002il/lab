<?php

namespace app\rbac\permissions;

use app\rbac\support\Permission;
use app\rbac\permissions as p;

class SendFeedbackOwnRepair extends Permission
{
	public $description = 'Отправка отзыва владельцем ремонта';
	
	public function children()
	{
		return [
			new p\SendFeedback(),
		];
	}
}
