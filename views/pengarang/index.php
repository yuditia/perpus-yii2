<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengarang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengarang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pengarang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',
            'email:email',
            'hp',
            [

                'attribute' => 'foto',
    
                'format' => 'html',
    
                'label' => 'Avatar',
    
                'value' => function ($model) {
    
                    return Html::img('web/images/'.$model['foto'],
    
                        ['width' => '60px']);
    
                },
    
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, app\models\Pengarang $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
