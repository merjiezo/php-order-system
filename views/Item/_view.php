<?php
use yii\helpers\Html;
?>

<div class="post">
	<div class="title">

		<h3><?=Html::encode($model->id);?></a></h3>

		<div class="item">
			<img src="<?=$model->img?>">
			<br>
<?=Html::encode($model->item_name)."&nbsp;&nbsp;&nbsp;&nbsp;";
?>
			<?=Html::encode('单价:'.$model->item_price).'元';?>
		</div>

	</div>
</div>