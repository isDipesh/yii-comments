<?php
$this->breadcrumbs = array(
    Yii::t('app', $model->owner_name),
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Edit'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->comment_id), 'confirm' => 'Are you sure you want to delete this item?')),);
?>

<h1> <?php echo Yii::t('app', 'Edit Comment'); ?></h1>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comment-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'userName'); ?>
        <?php echo $form->textField($model, 'userName', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'userName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comment_text'); ?>
        <?php echo $form->textArea($model, 'comment_text', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment_text'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>
    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->