<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'style'=>'width:50%','disabled' => true]) ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'style'=>'width:50%']) ?>

    <?= $form->field($model, 'birthday')->textInput(['style'=>'width:50%']) ?>

    <?= $form->field($model, 'usertype')->dropDownList(['1'=>'--普通--','2'=>'--会员--'], ['prompt'=>'--请选择--','style'=>'width:120px'])?>

    <?= $form->field($model, 'avatar')->hint(\Yii::t('app', '图像'))->fileInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord){$model->sex = 1;$model->status = 1;}?>

    <?= $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女'])?>

    <?= $form->field($model, 'status')->radioList(['1'=>'可用','0'=>'禁用']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
