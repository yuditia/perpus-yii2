<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Pengarang;
use app\models\Penerbit;
use app\models\Kategori;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'isbn',
            'judul:ntext',
            'tahun_cetak',
            'stok',
            //'bentuk:ntext',
            //'idpengarang0.nama',
            [
                'attribute'=>'idpengarang',
                'value'=>'idpengarang0.nama',
                'filter'=>ArrayHelper::map(Pengarang::find()->all(),'id','nama')
            ],
            //'idpenerbit0.nama',
            [
                'attribute'=>'idpenerbit',
                'value'=>'idpenerbit0.nama',
                'filter'=>ArrayHelper::map(Penerbit::find()->all(),'id','nama')
            ],
            //'idkategori',
            [
                'attribute'=>'idkategori',
                'value'=>'idkategori0.nama',
                'filter'=>ArrayHelper::map(Penerbit::find()->all(),'id','nama')
            ],
            //'cover',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, app\models\Buku $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
