<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
<p><?= Html::button('+ Nueva unidad', ['value' => Url::to(Yii::$app->getUrlManager()->getBaseUrl()."/backend/web/index.php?r=categoria/create"),'class' => 'btn btn-info showModalButton', 'title' => "Nueva unidad"]) ?></p>
<?php Pjax::begin((['id'=>'categoria-grid'])) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],           
            'nombre',
            'codigo',
            [
                'attribute' => 'imagen',
                'format' => 'html',
                'label' => 'Imagen',
                'value' => function ($data) {
                return Html::img(Yii::$app->request->BaseUrl.'/uploads/'.$data['imagen'],
                ['width' => '60px']);
               },
          ],

          [
            'class' => 'yii\grid\ActionColumn',
            'buttons'=>[
                  'view'=>function ($url, $model) {
                      $t = 'categoria/view/'.$model->id;
                      return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value' => Url::to($t),'class' => 'btn btn-info showModalButton', 'title' => "Ver empleado"]);
                  },
                  'update'=>function ($url, $model) {
                      $t ='index.php?r=categoria/update/&id='.$model->id;
                      return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to($t), 'class' => 'btn btn-info showModalButton', 'title' => "Editar empleado"]);
                  },
                  'delete' => function($url, $model){
                      $t = 'index.php?r=categoria/delete/'.$model->id;
                      return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                          'class'        => 'btn btn-danger',
                          'title'        => 'Eliminar',
                          'data-confirm' => '¿Desea realmente eliminar la unidad: '.$model->nombre. '?',
                          'data-method'  => 'post',
                      ]);
                  }
              ],
          ],

        ],
    ]); ?>


</div>
