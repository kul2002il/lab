<?php

namespace app\rbac\rules;

use app\rbac\support\Rule;
use app\models\User;

class IsSmth extends Rule
{
	public function check($user, $item, $params)
	{
		if(!$user)
		{
			return $item->name === 'Guest';
		}
		if($item->name === 'User')
		{
			return true;
		}
		return User::findOne($user)->idRole0->code === $item->name;
	}
}
