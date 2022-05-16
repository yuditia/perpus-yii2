<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengarang */

$this->title = 'Tambah Pengarang';
$this->params['breadcrumbs'][] = ['label' => 'Pengarang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengarang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
