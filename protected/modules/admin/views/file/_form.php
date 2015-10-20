<?php
/* @var $this FileController */
/* @var $model FIle */
/* @var $form CActiveForm */
?>

    <div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'file-form',
            'htmlOptions' => array(
                'class' => 'form-horizontal row-border',
                'enctype'=>"multipart/form-data",
            ),
            'enableAjaxValidation' => false,
            'focus'=>'input[type="text"]:first',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'errorCssClass' => 'has-error',
            ),
        ));
        ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model, 'title', array('class' => 'form-control' )); ?>
            </div>
            <div class="col-md-3"><div class="help-block"><?php echo $form->error($model, 'title'); ?></div></div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'file', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-6">
                <?php if(!$model->isNewRecord): ?>
                    <?php echo $model->name ?>
                <?php endif; ?>
                <?php echo CHtml::activeFileField($model, 'file', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-3">
                <div class="help-block">
                    <?php echo $form->error($model, 'file'); ?>
                </div>
            </div>
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

