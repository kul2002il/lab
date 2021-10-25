<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Контакты';
?>
<div class="container py-4">
	<div class="row">
		<div class="col">
			<div class="card w-100">
				<img src="<?=url::base()?>/static/img/envelope.svg"
					class="bd-placeholder-img card-img-top py-2"
					width="100%" height="180">
			
				<div class="card-body">
					<h5 class="card-title">Написать</h5>
					<p class="card-text">
						Напишите нам на сайте.
						Ваше сообщение непременно не останется без внимания.
					</p>
					<a href="<?=Url::toRoute('/site/contact');?>" class="btn btn-primary">Написать</a>
				</div>
			</div>
		</div>
		
		<div class="col">
			<div class="card w-100">
				<img src="<?=url::base()?>/static/img/phone.svg"
					class="bd-placeholder-img card-img-top py-2"
					width="100%" height="180">
			
				<div class="card-body">
					<h5 class="card-title">Позвонить</h5>
					<p class="card-text">
						Вы всегда можете нам позвонить на телефон.
					</p>
					<a href="#" class="btn btn-primary">Показать номер</a>
				</div>
			</div>
		</div>
		
		<div class="col">
			<div class="card w-100">
				<img src="<?=url::base()?>/static/img/at.svg"
					class="bd-placeholder-img card-img-top py-2"
					width="100%" height="180">
			
				<div class="card-body">
					<h5 class="card-title">Email</h5>
					<p class="card-text">
						Можете написать нам на email.
					</p>
					<a href="#" class="btn btn-primary">Показать email</a>
				</div>
			</div>
		</div>
	</div>
</div>