<?php
/* @var $this MembershipController */

?>
<div class="custom-header">
    <h1 class="custom-title"><?php echo Yii::t('front', 'Add Membership'); ?></h1>
</div>

<div class="row">

    <div class="col-sm-8 form-main">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'custom-form',
//            'htmlOptions' => array('class' => 'form-horizontal row-border'),
            'enableAjaxValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'errorCssClass' => 'has-error',
            ),
        ));
        ?>
        <div class="row">
            <h1>Üye Ol</h1>
            <div class="left-column col-sm-6">
                <?php echo $form->dropDownList($model, 'kimsin', Membership::getKimsin(), array('id' => 'enduser-type')); ?>
                <?php echo $form->textField($model, 'isim', array('placeholder' => 'Isim' )); ?>
                <script type="text/javascript">
                    jQuery(function($){
                        $("#phone").mask("(599) 999-9999");
                    });
                </script>
                <?php echo $form->textField($model, 'mobile', array('placeholder' => 'Mobile', 'id' => 'phone' )); ?>
                <?php echo $form->dropDownList($model, 'ilce', array('Ilce'), array('id' => 'enduser-from_town')); ?>
            </div>
            <div class="right-column col-sm-6">
                <?php echo $form->dropDownList($model, 'profession', Membership::getProfession(), array('id' => 'enduser-profession_type')); ?>
                <?php echo $form->textField($model, 'soyadı', array('placeholder' => 'Soyadı')); ?>
                <?php echo $form->passwordField($model, 'parola', array('placeholder' => 'Parola')); ?>
                <?php echo $form->dropDownList($model, 'sehir', Membership::getSehir(), array('id' => 'enduser-from_city')); ?>
            </div>
        </div>
        <?php echo CHtml::submitButton(Yii::t('Front', 'Gönder'), array('class' => 'next action-button')); ?>


        <?php $this->endWidget(); ?>

    </div><!-- /.main -->

    <div class="col-sm-3 col-sm-offset-1 sidebar members-table"">
        <div class="sidebar-module sidebar-module-inset ">
            <h4 class="sidebar-title"><?php echo Yii::t('front', 'Üyeler');?></h4>
        </div>

        <div class="list-group custom-group member-item">
            <?php $i = 1; foreach($members as $member): ?>
            <a href="javascript:" class="list-group-item">
                <?php echo "$i&nbsp&nbsp$member->isim&nbsp$member->soyadı"; $i++; ?>
            </a>
            <?php endforeach; ?>
        </div>

    </div><!-- /.sidebar -->

</div><!-- /.row -->
