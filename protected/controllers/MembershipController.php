<?php

class MembershipController extends Controller
{
	public function actionIndex()
	{
		$this->layout = 'membership';
		$model = new Membership;
		$members = Membership::model()->findAll(array('order'=>'id desc'));
		$this->performAjaxValidation($model);

		if(isset($_POST['Membership'])){
			$model->attributes = $_POST['Membership'];

			$model->created_at = time();
			$model->updated_at = time();
			$flash ='Membership successfully created';
			if($model->validate()){
				if($model->save()){
					Yii::app()->user->setFlash('success',$flash);
					$this->redirect(array('index'));
				}
			}
		}
		$this->render('index', array('model' => $model, 'members' => $members));
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='custom-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}