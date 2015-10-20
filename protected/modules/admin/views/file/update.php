<?php
/* @var $this FIleController */
/* @var $model File */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Detail View', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('admin', 'Change file ') . $model->title; ?></h1>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>