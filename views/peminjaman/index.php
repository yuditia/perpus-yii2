<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Buku;
use app\models\Anggota;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'idbuku0.judul',
            [
                'attribute'=> 'idbuku',
                'value'=> 'idbuku0.judul',
                'filter'=> ArrayHelper::map(Buku::find()->all(),'id','judul')
            ],
            //'idanggota0.nama',
            [
                'attribute'=> 'idanggota',
                'value'=> 'idanggota0.nama',
                'filter'=> ArrayHelper::map(Anggota::find()->all(),'id','nama')
            ],
            'jml',
            'tgl_pinjam',
            'tgl_kembali',
            //'keterangan:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, app\models\Peminjaman $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
