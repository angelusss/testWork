<?php

class AdminsController extends BaseAdminController
{
    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    /**
     * Saving action for create and update.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function initSave($model){

        $this->performAjaxValidation($model);

        if(isset($_POST['Admin'])){
            $model->attributes = $_POST['Admin'];

            if($model->isNewrecord) {
                $model->created_at = time();
                $model->password = md5($model->pwd);
            } else {
                if($model->password !== $model->pwd){
                    $model->password = md5($model->pwd);
                }
            }
            $model->updated_at = time();
            $flash = $model->isNewRecord ? 'Administrator successfully created' : 'Administrator successfully updated';
            if($model->validate()){
                if($model->save()){
                    Yii::app()->user->setFlash('success',$flash);
                    $this->redirect(array('admins/view', 'id' => $model->id));
                }
            }
        }
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Admin;

        $this->initSave($model);

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $model->pwd = $model->password;
        $this->initSave($model);

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
        if(false === $this->checkIsNotLast($model)) {
                Yii::app()->user->setFlash('error', 'You cannot delete the last administrator');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        $title = $model->login;
        $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Administratoe successfully deleted');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }

	}

    public function checkIsNotLast($model) {
        if ($model->role != Admin::ADMIN){
            return true;
        } else {
            $admins = Admin::model()->countByAttributes(array('role' => Admin::ADMIN));
            if($admins > 1)
                return true;
        }
        return false;
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{//CVarDumper::dump($_REQUEST); die;
        $model=new Admin('search');
        $model->unsetAttributes();
        if(isset($_GET['Admin']))
            $model->attributes=$_GET['Admin'];

        $this->render('admin',array(
            'model'=>$model,
        ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Admin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Admin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404);
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Admin $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
