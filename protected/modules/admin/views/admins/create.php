<?php
/* @var $this AdminsController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Admins', 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('admin', 'Create Admin'); ?></h1>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>