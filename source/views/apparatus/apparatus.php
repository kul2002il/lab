<?php

/* @var $this yii\web\View */
/* @var $pagination yii\data\Pagination*/
/* @var $apparatus app\models\Apparatus */
/* @var $messages app\models\Message[] */
/* @var $messageForm app\models\Message */

use app\widgets\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Html::encode($apparatus->name);
?>
<div class="container py-3">
	<h2>
		<?= Html::encode($apparatus->name)?>
	</h2>
</div>

<div class="container">
	<div class="row">
		<div class="col-4 my-2 py-2">
			<img alt="Изображение аппарата" class="img-fluid" src="<?=$apparatus->idFile0->url?>">
			<div class="border-bottom border-4"><?='Статус'?></div>
			<div>
				<a href="">Файлы</a>
			</div>
			<div>
				<a href="">История</a>
			</div>
		</div>
		<div class="col">
			<?= Pagination::widget(['pagination' => $pagination]) ?>
			<?php foreach ($messages as $pin):?>
			<div class="my-3 d-flex">
				<?php
				$myMess = $pin->idSender === Yii::$app->user->id;
				$spaceLeft = '';
				$spaceRight = '<dir class="flex-grow-1 m-0"></dir>';
				if($myMess){
					$spaceLeft = $spaceRight;
					$spaceRight = '';
				}
				?>
				<?=$spaceLeft?>
				<div class="bubble-message">
					<div>
						<?=Html::encode($pin->content)?>
					</div>
					<div class="text-muted">
						<?=$pin->datetime?>
					</div>
				</div>
				<?=$spaceRight?>
			</div>
			<?php endforeach;?>
			<?= Pagination::widget(['pagination' => $pagination]) ?>
			
			<?php $form = ActiveForm::begin(['class' => 'form-message border-top']) ?>
				<div class="d-flex align-items-end">
					<div class="btn">
						<img class="button-message" alt="paperclip" src="<?=Url::base()?>/static/img/paperclip.svg">
					</div>
					<?= $form->field($messageForm, 'content', [
						'template' => '{input}',
						'options' => ['class' => 'flex-grow-1'],
					])->textarea([
						'class' => 'autogrow textarea-message',
						'style' => 'width: 100%',
						'autofocus' => true,
					]); ?>
					<button class="btn">
						<img class="button-message" alt="send" src="<?=Url::base()?>/static/img/send.svg">
					</button>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>