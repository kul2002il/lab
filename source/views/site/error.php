<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container">
	<div class="site-error">
	
		<h1><?= Html::encode($this->title) ?></h1>
	
		<div class="alert alert-danger">
			<?= nl2br(Html::encode($message)) ?>
		</div>
	
		<p>
			Случилась ошибка, пока сервер обрабатывал Ваш запрос.
		</p>
		<p>
			Пожалуйста, свяжитесь с нами, если Вы думаете, что это ошибка сервера.
		</p>
	
	</div>
</div>