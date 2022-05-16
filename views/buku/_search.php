<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BukuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'isbn') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'tahun_cetak') ?>

    <?= $form->field($model, 'stok') ?>

    <?php // echo $form->field($model, 'bentuk') ?>

    <?php // echo $form->field($model, 'idpengarang') ?>

    <?php // echo $form->field($model, 'idpenerbit') ?>

    <?php // echo $form->field($model, 'idkategori') ?>

    <?php // echo $form->field($model, 'cover') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
