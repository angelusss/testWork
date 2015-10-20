<?php
/* @var $this AdminsController */
/* @var $model Admin */
?>

<div id="page-heading">
    <h1><?= Yii::t('admin', 'Admins') ?></h1>
</div>
<?php //if(Yii::app()->user->hasFlash('success')): ?>
    <?php
    $this->widget('booster.widgets.TbAlert', array(
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'events' => array(),
        'htmlOptions' => array(),
        'userComponentId' => 'user',
        'alerts' => array( // configurations per alert type
            // success, info, warning, error or danger
            'success' => array('closeText' => '&times;'),
            'info', // you don't need to specify full config
            'warning' => array('closeText' => '&times;'),
            'error' => array('closeText' => '&times;')
        ),
    ));
    ?>
<?php //endif; ?>
<div class="options">
    <a href="<?= Yii::app()->createUrl("/admin/admins/create") ?>" class="btn btn-primary">
        <?php echo Yii::t('admin_panel', 'Create Admin'); ?>
    </a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'login',
		'email',
        array(
            'value' => 'Admin::getRole($data->role)',
            'name' => 'role',
            'type' => 'raw',
            'filter' => Admin::getRoleFilter(),
        ),
        array(
            'value' => 'date("F j, Y, g:i a",$data->created_at)',
            'name' => 'created_at',
            'filter' => false,
        ),
        array(
            'value' => 'date("F j, Y, g:i a",$data->updated_at)',
            'name' => 'updated_at',
            'filter' => false,
        ),
        array(
            'class'=>'CButtonColumn',
            'htmlOptions' => array('style'=>'width:7%'),
            'deleteConfirmation'=>Yii::t('admin', 'Are you sure?'),
        ),
	),
)); ?>
