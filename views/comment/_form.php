<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'owner_name'); ?>
            <?php echo $form->textField($model,'owner_name',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'owner_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'owner_id'); ?>
            <?php echo $form->textField($model,'owner_id'); ?>
            <?php echo $form->error($model,'owner_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'parent_comment_id'); ?>
            <?php echo $form->textField($model,'parent_comment_id'); ?>
            <?php echo $form->error($model,'parent_comment_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'creator_id'); ?>
            <?php echo $form->textField($model,'creator_id'); ?>
            <?php echo $form->error($model,'creator_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'user_name'); ?>
            <?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'user_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'user_email'); ?>
            <?php echo $form->textField($model,'user_email',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'user_email'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'comment_text'); ?>
            <?php echo $form->textArea($model,'comment_text',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'comment_text'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'status'); ?>
            <?php echo $form->textField($model,'status'); ?>
            <?php echo $form->error($model,'status'); ?>
        </div>
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->