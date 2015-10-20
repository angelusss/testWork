<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('admin', 'Add File'); ?></h1>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>