<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\permissions as p;
use app\rbac\rules as rule;

class Guest extends Role
{
	public $description = 'Простой гость';

	public function children()
	{
		return [
			new p\SignIn(),
			new p\SignUp(),
			new p\ViewFeedback(),
		];
	}

	public function rule()
	{
		return new rule\IsSmth();
	}
}
