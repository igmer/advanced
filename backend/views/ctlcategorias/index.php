<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CtCategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ctl Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ctl-categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ctl Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'codigo',
            'imagen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
