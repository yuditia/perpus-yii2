<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pengarang;
use app\models\Penerbit;
use app\models\Kategori;
use yii\helpers\ArrayHelper;

//ambil master data dari tiap model
$ar_pengarang = ArrayHelper::map(Pengarang::find()->asArray()->all(),'id','nama');
$ar_penerbit = ArrayHelper::map(Penerbit::find()->asArray()->all(),'id','nama');
$ar_kategori = ArrayHelper::map(Kategori::find()->asArray()->all(),'id','nama');

/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tahun_cetak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stok')->textInput() ?>

    <?= $form->field($model, 'bentuk')->textarea(['rows' => 6]) ?>

    <? // $form->field($model, 'idpengarang')->textInput() ?>

    <?php echo $form->field($model, 'idpengarang')->dropDownList(
                $ar_pengarang, 
                ['prompt'=>'pilih pengarang...']);
    ?>

    <?php //$form->field($model, 'idpenerbit')->textInput() ?>

    <?php echo $form->field($model, 'idpenerbit')->dropDownList(
                $ar_penerbit, 
                ['prompt'=>'pilih penerbit...']);
    ?>

    <?php // $form->field($model, 'idkategori')->textInput() ?>

    <?= $form->field($model, 'idkategori')->radioList($ar_kategori); ?>

    <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
