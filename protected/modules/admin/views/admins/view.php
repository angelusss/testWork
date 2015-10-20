<?php
/* @var $this AdminsController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Admins`', 'url'=>array('index')),
//	array('label'=>'Create Admin', 'url'=>array('create')),
//	array('label'=>'Update Admin', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Admin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Ви впевненіб що хочете видалити цього адміністратора?')),
//	array('label'=>'Manage Admin', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('admin', 'Detail view for admin ') . $model->login; ?></h1>
<?php if(Yii::app()->user->hasFlash('success')): ?>
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
            'warning' => array('closeText' => false),
            'error' => array('closeText' => 'AAARGHH!!')
        ),
    ));
    ?>
<?php endif; ?>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'login',
		'email',
        array(
            'name'=>'role',
            'value'=>Admin::getRole($model->role),
        ),
        array(
            'name'=>'created_at',
            'value'=>Yii::app()->dateFormatter->formatDateTime($model->created_at, 'long','long'),
        ),
        array(
            'name'=>'updated_at',
            'value'=>Yii::app()->dateFormatter->formatDateTime($model->updated_at, 'long','long'),
        ),
	),
)); ?>
<a href="<?= Yii::app()->createUrl("/admin/admins/create") ?>" class="btn btn-success">
    <?php echo Yii::t('admin_panel', 'Create more'); ?>
</a>
<a href="<?= Yii::app()->createUrl("/admin/admins/update", array('id' => $model->id)) ?>" class="btn btn-primary">
    <?php echo Yii::t('admin_panel', 'Edit'); ?>
</a>
<a href="<?= Yii::app()->createUrl("/admin/admins/delete", array('id' => $model->id)) ?>" class="btn btn-danger delete">
    <?php echo Yii::t('admin_panel', 'Delete'); ?>
</a>
<script>
    $('.delete').click(function(e) {
        e.preventDefault();
        if (confirm("Are you sure?")) {
            location.href = $(this).attr('href');
        }
    });
</script>