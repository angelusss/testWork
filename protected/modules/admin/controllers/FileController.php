<?php

class FileController extends BaseAdminController
{
    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)	{
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

        if(isset($_POST['File'])){
            $model->attributes = $_POST['File'];

            if($model->isNewrecord) {
                $model->created_at = time();
            }
            if (isset($_FILES['File']['name']['file']) && $_FILES['File']['name']['file'] != ''){
                $model->name = $_FILES['File']['name']['file'];
                $model->file = CUploadedFile::getInstance($model,'file');
                $model->size = $_FILES['File']['size']['file'];
            } else {
				$model->file = '';
			}
            $model->updated_at = time();
            $flash = $model->isNewRecord ? 'File successfully created' : 'File successfully updated';
            if($model->validate()){
                if($model->save()){
                    if ($model->file != '') {
                        $dir = BASE_PATH . DIRECTORY_SEPARATOR . 'uploadFiles';

                        if(!is_dir($dir)){
                            mkdir($dir, 0777);
                        }

                        $file = $dir . '/' . $model->name;
//                        if(!is_file($img))
                        $model->file->saveAs($file);
                    }
                    Yii::app()->user->setFlash('success',$flash);
                    $this->redirect(array('file/view', 'id' => $model->id));
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
		$model = new File;

        $this->initSave($model);
        $model->size = '';
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

        $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'File successfully deleted');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new File('search');
        $model->unsetAttributes();
        if(isset($_GET['File']))
            $model->attributes=$_GET['File'];

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
		$model=File::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
