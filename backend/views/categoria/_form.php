<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Unidades */
/* @var $form yii\widgets\ActiveForm */

if ($model->isNewRecord) {
    $url   = "categoria/validation";
} else {
    $url   = "categoria/validation";
}

?>
<div class="col-lg-6 col-md-6">
    <div class="categoria-form">

        <?php $form = ActiveForm::begin([
            "id"                   => $model->formName(),
            "enableAjaxValidation" => true,
            "validationUrl"        => Url::toRoute($url)
        ]); ?>

        <div class="modal-body">
            <div class="form-group">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Crear Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<?php
$script = <<< JS
$('form#{$model->formName()}').on('beforeSubmit', function(e)
{
   var \$form =$(this);
      $.post(
         \$form.attr("action"), //serlializar el formulario
         \$form.serialize()
      )
      .done(function(result){
         if (result == 1) {
            $(\$form).trigger("reset");
            $(document).find('#modal').modal('hide');
            $.pjax.reload({container: '#categoria-grid'});
         }else{
            alert("Ha habido un error de procesamiento")
         }
      })
      .fail(function(){
         console.log("Error en el servidor")
      });
   return false;
});

JS;
$this->registerJs($script);
