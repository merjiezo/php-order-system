<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdertablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '当天所有订单号';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordertables-index">

    <h1><?=Html::encode($this->title)?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
<?=Html::a(Yii::t('app', 'Create Ordertables'), ['create'], ['class' => 'btn btn-success'])?>
</p>

<?=GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel'  => $searchModel,
		'columns'      => [
			['class'      => 'yii\grid\SerialColumn'],

			'order_id',
			'item_id',
			'number',

			['class' => 'yii\grid\ActionColumn'],
		],
	]);?>
</div>
