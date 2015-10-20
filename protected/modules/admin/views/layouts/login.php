<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel">

<!--    <link href="--><?php //echo $this->module->assetsUrl; ?><!--/less/styles.less" rel="stylesheet/less" media="all">-->
    <!-- <link rel="stylesheet" href="assets/css/styles.min.css?=120"> -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin_panel.css">
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<!--    <script type="text/javascript" src="--><?php //echo $this->module->assetsUrl; ?><!--/js/less.js"></script>-->
</head>
<body class="focusedform">
<div class="verticalcenter">
    <?= $content ?>
</div>


</body>
</html>