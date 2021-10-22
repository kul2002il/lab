<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */

use app\widgets\FormFloating;

$this->title = 'Регистрация';

?>
<div class="container p-4">

<h2 class="h3 mb-3 fw-normal w-3">Регистрация</h2>

<?php $form = FormFloating::begin(); ?>
	<div class="row">
		<div class="col">
			<?php
			echo $form->field($user, 'nameLast')->textInput(['placeholder' => 'Иванов']);
			echo $form->field($user, 'nameFirst')->textInput(['placeholder' => 'Василий']);
			echo $form->field($user, 'nameMiddle')->textInput(['placeholder' => 'Владимирович']);
			echo $form->field($user, 'email')->textInput(['placeholder' => 'exemple@exemple.com']);
			echo $form->field($user, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'password']);
			echo $form->field($user, 'password_repeat')->passwordInput(['maxlength' => true, 'placeholder' => 'password']);
			?>
			<input class="btn btn-lg btn-primary" type="submit" name="signup" value="Зарегистрироваться">
		</div>
		<div class="col">
			<div class="border border-2 rounded p-2">
				Пароль
				<ul>
					<li>Должен содержать не менее восьми символов.</li>
					<li>Состоит из заглавных и прописных символов
						латинского (A-Z, a-z) алфавита.</li>
					<li>Содержит в себе цифры</li>
					<li>Содержит спецсимволы</li>
					<li>Не является последовательностью клавишь на клавиатуре (asdfghjkl).</li>
				</ul>
			</div>
		</div>
	</div>
<?php FormFloating::end(); ?>

</div>
