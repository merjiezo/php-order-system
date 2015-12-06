<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?=Html::csrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
<?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php?r=site">点餐</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?r=order/ordershow">后台管理<span class="sr-only">(current)</span></a></li>
        <li><a href="index.php?r=item/index">前台</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
<?=Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs'])?$this->params['breadcrumbs']:[],
	])?>
        <?=$content?>
</div>
</div>



<?php $this->endBody()?>
</ody>
</html>
<?php $this->endPage()?>
