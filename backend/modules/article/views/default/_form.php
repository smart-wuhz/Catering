<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'style'=>'width:50%']) ?>

    <?= $form->field($model, 'pic')->fileInput() ?>

    <?= $form->field($model, 'type')->dropDownList($category, ['prompt'=>'请选择','style'=>'width:120px']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])?>

    <?= $form->field($model, 'weight')->textInput(['style'=>'width:120px']) ?>

    <?= $form->field($model, 'status')->radioList(['1'=>'显示','0'=>'不显示'])?>

    <?= $form->field($model, 'verify_status')->radioList(['1'=>'通过','0'=>'不通过']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
