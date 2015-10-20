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
        <a class="navbar-brand" href="<?= Yii::app()->createUrl("/admin") ?>">
            <?php echo Yii::t('admin', 'File Management System'); ?>
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo Yii::app()->user->name; ?>
<!--                --><?php //echo Yii::app()->user->getState('admin'); die;?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?= Yii::app()->createUrl("/admin/default/logout") ?>">
                        <i class="glyphicon glyphicon-off"></i> <?php echo Yii::t('admin', 'Log Out'); ?>
                    </a>
                </li>
            </ul>
            <script>
                $('.dropdown-toggle').click(function(){
                    $(this).closest('li').toggleClass('open');
                })
            </script>
        </li>
    </ul> <?php //CVarDumper::dump(Yii::app()->controller->id); ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
<!--            <li class="active">-->
            <li class="<?php echo Yii::app()->controller->id == 'file' ? 'active' : ''?>">
                <a href="<?= Yii::app()->createUrl("/admin/file") ?>"><i class="glyphicon glyphicon-list-alt"></i> <?php echo Yii::t('admin', 'Files'); ?></a>
            </li>
            <li class="<?php echo Yii::app()->controller->id == 'admins' ? 'active' : ''?>">
                <a href="<?= Yii::app()->createUrl("/admin/admins") ?>"><i class="glyphicon glyphicon-user"></i> <?php echo Yii::t('admin', 'Admins'); ?></a>
            </li>
        </ul>
        <script>
            $('.left_menu_dropdown').click(function(){
                $(this).closest('li').children('.collapse').toggleClass('in');
                $(this).children('.arrow').removeClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
                if($(this).closest('li').children('.collapse').hasClass('in')){
                    $(this).children('.arrow').addClass('glyphicon-chevron-up');
                } else {
                    $(this).children('.arrow').addClass('glyphicon-chevron-down');
                }

            });
        </script>
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
