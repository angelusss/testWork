<?php

class DefaultController extends BaseAdminController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin(){
		$model = new AdminLogin;

		// if it is ajax validation request
		if (Yii::app()->getRequest()->isAjaxRequest && Yii::app()->getRequest()->getParam('ajax') == 'login-from') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['AdminLogin'])) {
			$model->attributes = $_POST['AdminLogin'];
			if ($model->validate() && $model->login()){
					$this->redirect(array('/admin'));
			}
		}
		$this->layout = 'login';
		$this->render('login', array('model' => $model));
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->getBaseUrl(true) . '/admin');
	}

	public function actionError(){
		if(Yii::app()->user->isGuest){
			$this->layout = false;
		}
		if(isset($_GET['debug']) && YII_DEBUG){
			CVardumper::dump(Yii::app()->errorHandler->error);
			die;
		}
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}