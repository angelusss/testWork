<?php
/* @var $this AdminsController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Admins', 'url'=>array('index')),
	array('label'=>'Detail View', 'url'=>array('view', 'id'=>$model->id)),
);
?>

    <h1><?php echo Yii::t('admin', 'Update Admin #') . $model->id; ?></h1>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>