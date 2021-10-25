<?php

namespace app\widgets;

use yii\widgets\LinkPager;

class Pagination extends LinkPager
{
	public $aliginCenter = true;
	public function init()
	{
		$this->linkContainerOptions += ['class' => 'page-item'];
		$this->linkOptions += ['class' => 'page-link'];
		$this->disabledListItemSubTagOptions += ['class' => 'page-link'];
		if($this->aliginCenter)
		{
			$this->options['class'] .= ' d-flex justify-content-center ';
		}
		parent::init();
	}
}
