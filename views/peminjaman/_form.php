<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Anggota;
use app\models\Buku;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

$ar_anggota = ArrayHelper::map(Anggota::find()->asArray()->all(),'id','nama');
$ar_buku = ArrayHelper::map(Buku::find()->asArray()->all(),'id','judul');

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">

    
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'idbuku')->dropDownList(
                    $ar_buku, 
                    ['prompt'=>'Pilih Anggota...']);
            ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'idanggota')->dropDownList(
                    $ar_anggota, 
                    ['prompt'=>'Pilih Anggota...']);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'jml')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 ">
            <?php //$form->field($model, 'tgl_pinjam')->textInput() ?>
            <?= $form->field($model, 'tgl_pinjam')->widget(DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>
        </div>
        <div class="col-md-4 ">
            <?= $form->field($model, 'tgl_kembali')->widget(DatePicker::classname(), [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            ]) ?>
        </div>
    </div>
    
    

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
