<?php

use common\models\Food;
use common\models\Ingredients;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Food $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="food-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-box">
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'ingredientIds[]')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Ingredients::find()->where(['status' => Ingredients::STATUS_ACTIVE])->all(), 'id', 'name'), // Assuming $items is your array of data
                    'options' => ['placeholder' => 'Masalliqlarni tanlang...', 'multiple' => true],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
                <?= $form->field($model, 'status')->dropDownList([
                    Food::STATUS_ACTIVE => "Active",
                    Food::STATUS_INACTIVE => "InActive",
                ], ['prompt' => "Statusni tanlang"])?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
