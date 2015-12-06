<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ordertables */

$this->title = Yii::t('app', 'Create Ordertables');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ordertables'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordertables-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
