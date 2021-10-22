<?php
/**
 * Это шаблон для генерации класса разрешения RBAC.
 */

use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\controller\Generator */

echo "<?php\n";
?>

namespace <?= $generator->namespace ?>;

use app\rbac\support\Rule;

class <?= StringHelper::basename($generator->name) ?> extends Rule
{
	public function check($user, $item, $params)
	{
		return false;
	}
}
