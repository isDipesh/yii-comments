<?php
class SettingsController extends Controller {


    public function actionCreate() {
        $model = new CommentSetting;
                if (isset($_POST['CommentSetting'])) {
            $model->setAttributes($_POST['CommentSetting']);

                
                try {
                    if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                            $this->redirect($_GET['returnUrl']);
                    } else {
                            $this->redirect(array('/comments/settings'));
                    }
                }
                } catch (Exception $e) {
                        $model->addError('', $e->getMessage());
                }
        } elseif(isset($_GET['CommentSetting'])) {
                        $model->attributes = $_GET['CommentSetting'];
        }

        $this->render('create',array( 'model'=>$model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        
        if(isset($_POST['CommentSetting'])) {
            $model->setAttributes($_POST['CommentSetting']);
                try {
                    if($model->save()) {
                        if (isset($_GET['returnUrl'])) {
                                $this->redirect($_GET['returnUrl']);
                        } else {
                                $this->redirect(array('/comments/settings'));
                        }
                    }
                } catch (Exception $e) {
                        $model->addError('', $e->getMessage());
                }

            }

        $this->render('update',array(
                'model'=>$model,
                ));
    }
                
               

    public function actionDelete($id) {
        if(Yii::app()->request->isPostRequest) {    
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                    throw new CHttpException(500,$e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                            $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                Yii::t('app', 'Invalid request.'));
    }
                
    public function actionIndex() {
        $model = new CommentSetting('search');
        $model->unsetAttributes();

        if (isset($_GET['CommentSetting']))
                $model->setAttributes($_GET['CommentSetting']);

        $this->render('index', array(
                'model' => $model,
        ));
    }

    public function loadModel($id) {
            $model=CommentSetting::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
            return $model;
    }

}