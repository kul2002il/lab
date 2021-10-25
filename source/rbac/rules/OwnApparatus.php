<?php

namespace app\rbac\rules;

use app\rbac\support\Rule;

class OwnApparatus extends Rule
{
	public function check($user, $item, $params)
	{
		return false;
	}
}
