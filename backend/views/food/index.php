<?php

use common\models\Food;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\FoodSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Taomlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-index">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Bosh sahifa </a>
                    </li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangi taom yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive p-5">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
                            'name',
                            [
                                'attribute' => 'ingredientIds',
                                'value' => function ($model) {
                                    $ingredients = $model->getFoodIngredients()->all();
                                    $text = "";
                                    foreach ($ingredients as $item) {
                                        $text = $item->ingredient->name . " , " . $text;
                                    }
                                    return $text;
                                },
                                'filter' => \kartik\select2\Select2::widget([
                                    'model' => $searchModel,
                                    'attribute' => 'ingredientIds',
                                    'data' => \yii\helpers\ArrayHelper::map(\common\models\Ingredients::find()->all(), 'id', 'name'),
                                    'options' => [
                                        'placeholder' => 'Masalliq bo\'yicha qidirish...',
                                        'multiple' => true, // Enable multiple selection
                                    ],
                                ]),
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    if ($data->status == Food::STATUS_ACTIVE) {
                                        return '<span class="badge badge-success">Faol</span>';
                                    } else {
                                        return '<span class="badge badge-danger">Faol emas</span>';
                                    }
                                },
                                'format' => 'raw',
                                'filter' => [Food::STATUS_ACTIVE => 'Faol',\common\models\Food::STATUS_INACTIVE => 'Faol emas']
                            ],

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Amallar',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'template' => '{buttons}',
                                'contentOptions' => ['style' => 'min-width:150px;max-width:150px;width:150px', 'class' => 'v-align-middle'],
                                'buttons' => [
                                    'buttons' => function ($url, $model) {
                                        $controller = Yii::$app->controller->id;
                                        $code = <<<BUTTONS
                                <div class="btn-group flex-center">
                                    <a href="/{$controller}/update?id={$model->id}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <a href="/{$controller}/delete?id={$model->id}" id="{$controller}{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove" data-method="post"><i class="far fa-trash-alt"></i></a>
                                </div>
BUTTONS;
                                        return $code;
                                    }

                                ],

                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
