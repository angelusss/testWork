<?php
/* @var $this FileController */
/* @var $model File */

?>

<div id="page-heading">
    <h1><?= Yii::t('admin', 'Files') ?></h1>
</div>
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
<div class="options">
    <a href="<?= Yii::app()->createUrl("/admin/file/create") ?>" class="btn btn-primary">
        <?php echo Yii::t('admin_panel', 'Add File'); ?>
    </a>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'title',
        array(
            'value' => '$data->getFile()',
            'name' => 'name',
            'filter' => false,
            'type' => 'raw',
        ),
        'size',
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
            'htmlOptions' => array(
                'style' => 'width:6%',
            ),
		),
	),
)); ?>
