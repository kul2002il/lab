<?php

/* @var $this yii\web\View */

use app\models\MainPage;

$data = MainPage::getData();

$this->title = 'Главная';
?>

<div class="container-banner"
	style="background-image: url(<?=$data['banner']['image']?>)">
	<div class="blur">
		<div class="container banner"
			style="background-image: url(<?=$data['banner']['image']?>)"></div>
	</div>
</div>

<?php foreach ($data['heroes'] as $article):?>
<div class="container col-xxl-8 px-4">
	<div class="row flex-lg-row-reverse align-items-center g-5 py-4">
		<div class="col-10 col-sm-8 col-lg-6">
			<img src="<?= $article['image']?>" class="d-block mx-lg-auto img-fluid"
				alt="work.jpeg" width="700" height="500" loading="lazy">
		</div>
		<div class="col-lg-6">
			<h1 class="display-5 fw-bold lh-1 mb-3"><?= $article['title']?></h1>
			<p class="lead"><?= $article['text']?></p>
		</div>
	</div>
</div>
<?php endforeach;?>
