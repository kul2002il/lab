<?php

/* @var $this yii\web\View */
/* @var $apparatus app\models\Apparatus */
/* @var $repair app\models\Repair */

use yii\helpers\Html;
use app\widgets\FormFloating;
use app\models\Apparatus;
use app\models\Type;
use app\models\Brand;
use app\models\Model;

$apparatuses = Apparatus::getMy()->all();
$types = Type::find()->all();
$brands = Brand::find()->all();
$models = Model::find()->all();

$this->title = 'Новая заявка';
?>
<div class="container">
	<h2 class="border-bottom border-4 my-3">Новая заявка</h2>
	<?php $form = FormFloating::begin() ?>
		<div class="row">
			<div class="col">
				<h3>Добавленный аппарат</h3>
				<select class="form-select mb-3" name="apparatus">
					<option value="0" selected>Мой аппарат</option>
					<?php foreach ($apparatuses as $app):?>
					<option value="<?=$app->id?>"><?=$app->name?></option>
					<?php endforeach;?>
				</select>
				
				<h3>Новый аппарат</h3>
				<select class="form-select mb-3" name="type">
					<option selected>Тип</option>
					<?php foreach ($types as $app):?>
					<option value="<?=$app->id?>"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
				
				<select class="form-select mb-3" name="brand">
					<option selected>Бренд</option>
					<?php foreach ($brands as $app):?>
					<option value="<?=$app->id?>"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
				
				<select class="form-select mb-3" name="model">
					<option selected>Модель</option>
					<?php foreach ($models as $app):?>
					<option value="<?=$app->id?>"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="col">
				<h3>Поломка</h3>
				<?= $form->field($repair, 'title')->textInput(['placeholder' => 'Заголовок'])?>
				<?= $form->field($repair, 'description', [
					'template' => '{input}',
					'options' => [
						'class' => 'flex-grow-1',
						'style'=>'min-height: 70px;',
					],
				])->textarea([
					'class' => 'mb-3 autogrow textarea-message',
					'style' => 'width: 100%',
					'autofocus' => true,
				]);?>
				
				<?php //$form->field($file, 'imageFile')->fileInput() ?>
				<div class="input-group mb-3">
					<input type="file"
						class="form-control">
				</div>
				<input type="submit" class="btn btn-warning" name="request" value="Отправить">
			</div>
		</div>
	<?php FormFloating::end(); ?>
</div>