<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordertables */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ordertables',
]) . ' ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ordertables'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'order_id' => $model->order_id, 'item_id' => $model->item_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ordertables-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
