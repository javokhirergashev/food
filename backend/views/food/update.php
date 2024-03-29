<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Food $model */

$this->title = 'Update Food: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
//print_r($oldIngredients);die();
?>
<div class="food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'oldIngredients' =>  $oldIngredients
    ]) ?>

</div>
