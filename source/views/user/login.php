<?php

/* @var $this yii\web\View */

use app\widgets\FormFloating;
use yii\helpers\Html;

$this->title = 'Вход';
?>
<div class="mx-auto">

<div class="form-signin">
	<h2 class="h3 mb-3 fw-normal w-3">Вход</h2>
	<?php $form = FormFloating::begin(); ?>
	
	<?= $form->field($model, 'email')->textInput(['placeholder' => 'email2'])?>
	
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'email2']) ?>
	
	<?= Html::submitButton('Войти', ['class' => 'w-100 btn btn-lg btn-primary']) ?>
	
	<?php FormFloating::end(); ?>
</div>

</div>


