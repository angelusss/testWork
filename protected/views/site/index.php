<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo Yii::t('front', 'Welcome to ') . CHtml::encode(Yii::app()->name); ?></h1>

<h2>
	<?php
		echo Yii::t('front', 'It\'s ') . count($files) . Yii::t('front', ' files ')
	?>
</h2>
<div class="table_wrapper">
	<table class="items table">
		<thead>
			<tr>
				<td>Title</td>
				<td>Type</td>
				<td>Size</td>
				<td>Added</td>
				<td class="last"></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($files as $file):?>
				<tr>
					<td><?php echo $file->title?></td>
					<td><?php echo $file->getType()?></td>
					<td><?php echo $file->size . ' bytes'?></td>
					<td><?php echo date('d M Y', $file->created_at)?></td>
					<td><?php echo $file->getFile()?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>


