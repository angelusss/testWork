<?php
/* @var $this AdminsController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'admin-form',
        'htmlOptions' => array('class' => 'form-horizontal row-border'),
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'errorCssClass' => 'has-error',
        ),
    ));
    ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'login', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model, 'login', array('class' => 'form-control input-admin-login' )); ?>
        </div>
        <div class="col-md-3"><div class="help-block"><?php echo $form->error($model, 'login'); ?></div></div>
    </div>

    <?php if(!$model->isNewRecord): ?>
        <button id="change_pwd" style="margin-left: 306px; margin-bottom: 15px">
            <span><?php echo Yii::t('admin', 'Change Password'); ?></span>
        </button>
        <script>
            $('#change_pwd').click(function(e){
                e.preventDefault();
                $('.pwd-field').toggleClass('closed');
            });
        </script>
    <?php endif; ?>
    <div class="form-group pwd-field <?php echo $model->isNewRecord ? '' : 'closed'?>">
        <?php echo $form->labelEx($model, 'pwd', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->passwordField($model, 'pwd', array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-3">
            <div class="help-block">
                <?php echo $form->error($model, 'pwd'); ?>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model, 'email', array('class' => 'form-control input-admin-email' )); ?>
        </div>
        <div class="col-md-3"><div class="help-block"><?php echo $form->error($model, 'email'); ?></div></div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'role', array('class' => 'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->dropDownList($model, 'role', Admin::getRole(), array('class' => 'form-control user-identities')); ?>

        </div>
        <div class="col-md-3"><div class="help-block"><?php echo $form->error($model, 'role'); ?></div></div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="btn-toolbar">
                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('Admin', 'Create') : Yii::t('Admin', 'Save'), array('class' => 'btn-primary btn')); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->