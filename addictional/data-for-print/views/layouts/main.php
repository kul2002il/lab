<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<?php $this->registerCsrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?> — РЕПРОТЭК</title>
	<?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
	<div class="container">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
			<a href="<?=Url::toRoute('/');?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
				<span class="fs-4">РEПРОТЭК</span>
			</a>

			<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<li><a href="<?=Url::toRoute('/');?>" class="nav-link px-2 link-dark">Главная</a></li>
				<li><a href="<?=Url::toRoute('/news');?>" class="nav-link px-2 link-dark">Новости</a></li>
				<li><a href="<?=Url::toRoute('/site/contact-links');?>" class="nav-link px-2 link-dark">Контакты</a></li>
				<li><a href="<?=Url::toRoute('/site/about');?>" class="nav-link px-2 link-dark">О нас</a></li>
			</ul>

			<?php if(!Yii::$app->user->isGuest):?>
			<div class="col-md-3 text-end">
				<a href="<?=Url::toRoute('/user/personal-area');?>" class="btn btn-outline-dark me-2">
					<?=Yii::$app->user->identity->username?>
				</a>
				<a href="<?=Url::toRoute('/user/logout');?>" class="btn">
					<img alt="logout" src="<?=Url::base()?>/static/img/logout.svg" style="width: 40px;">
				</a>
			</div>
			<?php else:?>
			<div class="col-md-3 text-end">
				<a href="<?=Url::toRoute('/user/login');?>" class="btn btn-outline-dark me-2">Войти</a>
				<a href="<?=Url::toRoute('/user/signup');?>" class="btn btn-outline-dark">Регистрация</a>
			</div>
			<?php endif;?>
		</div>
	</div>
</header>

<main role="main" class="flex-shrink-0">
	<div class="container">
		<?= Alert::widget() ?>
	</div>
	<?= $content ?>
</main>

<footer class="footer mt-auto py-3 text-muted">
	<div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
		<div class="col-md-4 d-flex align-items-center">
			<span class="text-muted">2010—<?=date("Y")?> РЕПРОТЭК</span>
		</div>

		<!-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
			<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
			<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
			<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
		</ul> -->
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
