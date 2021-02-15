<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Categoria;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php  echo $form->field($model, 'id_categoria')->dropDownList(
            ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
            ['prompt' => 'Seleccione una categoria']
) ; /*
echo $form->field($model, 'id_categoria')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Categoria::find()->all(), 'id', 'unidad'),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione una unidad ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);*/




    ?>


    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>