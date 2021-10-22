<?php

namespace app\rbac\support;

/**
 * Проверяем authorID на соответствие с пользователем, переданным через параметры
 */
abstract class Rule extends \yii\rbac\Rule
{
	public function __construct($config = [])
	{
		parent::__construct($config);
		$mathes = [];
		preg_match('/(.*)\\\\(.+?)$/', get_called_class(), $mathes);
		$this->name = $mathes[2];
	}
	/**
	 * @param string|int $user the user ID.
	 * @param Item $item the role or permission that this rule is associated width.
	 * @param array $params parameters passed to ManagerInterface::checkAccess().
	 * @return bool a value indicating whether the rule permits the role or permission it is associated with.
	 */
	public function execute($user, $item, $params)
	{
		//$user = \app\models\User::findOne($user);
		return $this->check($user, $item, $params);
	}

	/**
	 * @param string|int $user the user ID.
	 * @param Item $item the role or permission that this rule is associated width.
	 * @param array $params parameters passed to ManagerInterface::checkAccess().
	 * @return bool a value indicating whether the rule permits the role or permission it is associated with.
	 */
	public abstract function check($user, $item, $params);
}
