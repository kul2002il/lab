<?php

namespace app\rbac\support;

class Item extends \yii\rbac\Item
{
	/*
	 * Дочерние роли и разрешения.
	 * @return \app\rbac\Role[]|\app\rbac\Permition[] Массив объектов ролей и разрешений.
	 */
	public function children()
	{
		return [];
	}

	/*
	 * Правила
	 * @return \app\rbac\Rule|null
	 */
	public function rule()
	{
		return null;
	}

	public function __construct($config = [])
	{
		parent::__construct($config);
		$mathes = [];
		preg_match('/(.*)\\\\(.+?)$/', get_called_class(), $mathes);
		$this->name = $mathes[2];
		$auth = \Yii::$app->authManager;
		$rule = $this->rule();
		if ($rule) {
			if(!$auth->getRule($rule->name))
			{
				$auth->add($rule);
			}
			$this->ruleName = $rule->name;
		}
		if (!$auth->getPermission($this->name) || true)
		{
			$auth->add($this);
		}
		foreach ($this->children() as $child) {
			if(!$auth->hasChild($this, $child))
			{
				$auth->addChild($this, $child);
			}
		}
	}
}
