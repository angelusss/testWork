<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('admin', 'File  ') . $model->title; ?></h1>
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
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
)); ?>

<a href="<?= Yii::app()->createUrl("/admin/file/create") ?>" class="btn btn-success">
    <?php echo Yii::t('admin', 'Create more'); ?>
</a>
<a href="<?= Yii::app()->createUrl("/admin/file/update", array('id' => $model->id)) ?>" class="btn btn-primary">
    <?php echo Yii::t('admin', 'Edit'); ?>
</a>
<a href="<?= Yii::app()->createUrl("/admin/file/delete", array('id' => $model->id)) ?>" class="btn btn-danger delete">
    <?php echo Yii::t('admin', 'Delete'); ?>
</a>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'title',
        'size',
        array(
            'name'=>'created_at',
            'value'=>Yii::app()->dateFormatter->formatDateTime($model->created_at, 'long','long'),
        ),
        array(
            'name'=>'updated_at',
            'value'=>Yii::app()->dateFormatter->formatDateTime($model->updated_at, 'long','long'),
        ),
        array(
            'name'=>'',
            'value'=>$model->getFile(),
            'type' => 'raw',
        ),
	),
)); ?>
<script>
    $('.delete').click(function(e) {
        e.preventDefault();
        if (confirm("<?php echo Yii::t('admin', 'Are you sure?') ?>")) {
            location.href = $(this).attr('href');
        }
    });
</script>
