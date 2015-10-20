<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/morris.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	<title><?php echo 'File Management System' ?></title>
</head>

<body>
<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="<?= Yii::app()->createUrl("/") ?>">
            <?php echo Yii::t('admin', 'File Management System'); ?>
        </a>
    </div>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">

    </div>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <?php echo $content; ?>
</div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!--<script>-->
<!--    $('.delete').click(function(e) {-->
<!--        e.preventDefault();-->
<!--        if (confirm("Вы впевнені?")) {-->
<!--            location.href = $(this).attr('href');-->
<!--        }-->
<!--    });-->
<!--</script>-->


<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
