<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CtlCategoria */

$this->title = 'Create Ctl Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Ctl Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ctl-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
