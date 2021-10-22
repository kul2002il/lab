<?php
/**
 * Это шаблон для генерации класса разрешения RBAC.
 */

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\controller\Generator */

echo "<?php\n";
?>

namespace <?= $generator->namespace ?>;

use app\rbac\support\Role;
use app\rbac\permissions as p;
use app\rbac\roles as r;
use app\rbac\rules as rule;

class <?= StringHelper::basename($generator->name) ?> extends Role
{
	public $description = '<?= $generator->description ?>';

	public function children()
	{
		return [
			new r/User(),
		];
	}

	public function rule()
	{
		return new rule\IsSmth();
	}
}
