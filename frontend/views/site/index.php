<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Yii::$app->language = 'ru-RU';
$this->title = 'Компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <div class="row">
        <div class="col-sm-6">
        <?php if($company_admin){
            echo  Html::a('Добавить компанию', ['create'], ['class' => 'btn btn-success btn-lg btn-block']);
        }
         ?>
    </div>
    </div>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'inn',
            'dg',
            'address',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',

            ],


            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'visible' => (bool)$company_admin
            ],
        ],
    ]); ?>


</div>
