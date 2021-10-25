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

namespace <?= $generator->permissionNamespace ?>;

use app\rbac\support\Permission;
use app\rbac\permissions as p;

class <?= StringHelper::basename($generator->name) ?> extends Permission
{
	public $description = '<?= $generator->description ?>';

	public function children()
	{
		return [
			// new p\,
		];
	}
}
