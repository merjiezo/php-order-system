<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\ListView;
header("Content-Type:image/png");

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '点餐';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?=Html::encode($this->title)?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
<?=Html::a('立即点餐', ['order/orderin'], ['class' => 'btn btn-success'])?>
</p>

<?=ListView::widget([
		'dataProvider'    => $dataProvider,
		'itemView'        => '_view',
		'layout'          => '{items}{pager}',
		'pager'           => [
			'maxButtonCount' => 10,
			'nextPageLabel'  => Yii::t('app', '下一页'),
			'prevPageLabel'  => Yii::t('app', '上一页'),
		],
		//'filterModel' => $searchModel,
		/*'columns' => [
	//['class' => 'yii\grid\SerialColumn'],

	//'id',

	//'item_detail',
	//'img',
	[
	'attribute'=>'img',
	'format' => ['image',['width'=>'178','height'=>'178',]],
	],
	'item_name',
	'item_price',

	[
	'label'=>'更多操作',
	'format'=>'raw',
	'value' => function($dataProvider){
	return Html::input('text', 'id', '', ['class'=> '$id']);
	}
	],


	//['class' => 'yii\grid\ActionColumn'],
	],
	 */
	]);?>
</div>
