<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
Yii::$app->language = 'ru-RU';
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <div class="row">
        <div class="col-sm-6">
            <?php if($company_admin){
        echo Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block btn-lg']);?>
        </div>
                <div class="col-sm-6">
        <?php echo Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-block btn-lg',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);} ?>
        </div>
    </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'inn',
            'dg',
            'address',
        ],
    ]) ?>

</div>
