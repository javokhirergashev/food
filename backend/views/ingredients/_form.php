<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Ingredients $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingredients-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-box">
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'status')->dropDownList([
                    \common\models\Ingredients::STATUS_ACTIVE => "Active",
                    \common\models\Ingredients::STATUS_INACTIVE => "InActive",
                ], ['prompt' => "Statusni tanlang"])?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
