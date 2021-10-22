<?php

/* @var $this yii\web\View */
/* @var $news app\models\News */
/* @var $pagination yii\data\Pagination */

use yii\helpers\Html;
use app\widgets\Pagination;

$this->title = 'Новости';

?>
<?= Pagination::widget(['pagination' => $pagination]) ?>
<div>
	<?php foreach ($news as $article):?>
	<div class="news-article">
		<div class="container col-xxl-8 px-4">
			<div class="row flex-lg-row-reverse align-items-center py-4">
				<div class="col-10 col-sm-8 col-lg-6">
					<img src="<?=$article->idFile0->url?>" class="d-block mx-lg-auto img-fluid"
						alt="news image" width="350" height="250">
				</div>
				<div class="col-lg-6">
					<h2 class="display-5 fw-bold mb-3"><?= Html::encode($article->title)?></h2>
					<p><?= Html::encode($article->content)?></p>
					<span class="text-muted"><?= Html::encode($article->datetime)?></span>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>
<?= Pagination::widget(['pagination' => $pagination]) ?>
