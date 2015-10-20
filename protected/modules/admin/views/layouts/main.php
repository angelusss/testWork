<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

<?php /*	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css"> */ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/morris.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin_panel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
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
        <a class="navbar-brand" href="<?= Yii::app()->createUrl("/admin_panel") ?>">
            <?php echo Yii::t('admin', 'Admin_Panel'); ?>
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
            <li class="<?php echo Yii::app()->controller->id == 'default' ? 'active' : ''?>">
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

<!-- Morris Charts JavaScript -->
<!--<script src="/js/plugins/morris/raphael.min.js"></script>-->
<!--<script src="/js/plugins/morris/morris.min.js"></script>-->
<!--<script src="/js/plugins/morris/morris.js"></script>-->
<!--<script src="/js/plugins/morris/morris-data.js"></script>-->
<script src="//cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<script src="/js/dev.js"></script>

<?php /*<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo Yii::t('admin_panel','Admin Panel'); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
            'activeCssClass'=>'active',
            'activateParents'=>true,
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('/admin_panel/site/index')),
				array('label'=>'Операторы', 'url'=>array('/admin_panel/site/page')),
				array('label'=>'Клиенты', 'url'=>array('/admin_panel/site/contact')),
				array(
                    'label'=>'Гайды',
                    'url'=>array('/admin_panel/site/contact'),
                    'linkOptions'=>array('id'=>'menuCompany'),
                    'itemOptions'=>array('id'=>'itemCompany'),
                    'items'=>array(
                        array('label'=>'Our Mission', 'url'=>array('/company/index')),
                        array('label'=>'About Us', 'url'=>array('/company/aboutUs')),
                        array('label'=>'Careers', 'url'=>array('/company/careers')),
                        array('label'=>'Contact Us', 'url'=>array('/company/contactUs')),
                        array('label'=>'Store Locator', 'url'=>array('/company/storeLocator')),
                    ),
                ),
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page --> */ ?>

</body>
</html>
