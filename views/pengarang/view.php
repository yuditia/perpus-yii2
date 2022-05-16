<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengarang */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pengarang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengarang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-7">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'nama',
                    'email:email',
                    'hp',
                    //'foto',
                ],
            ]) ?>
        </div>
        <div class="col-md-5">
            <center>
                <?php
                if(!empty($model->foto)){
                ?>
                    <img src="<?= Yii::$app->request->baseUrl;?>/images/<?= $model->foto; ?>" width="50%" />
                <?php
                }
                else{
                    ?>
                    <img src="<?= Yii::$app->request->baseUrl;?>/images/nophoto.png" width="50%" />
                    <?php } ?>


                               
            </center>
        </div>
    </div>

</div>
