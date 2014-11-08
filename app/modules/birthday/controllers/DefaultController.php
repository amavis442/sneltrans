<?php

namespace app\modules\birthday\controllers;

use yii\web\Controller;

use Yii;
use app\modules\birthday\models\Birthday;
use app\modules\birthday\models\BirthdaySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;




class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Birthday models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BirthdaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Birthday model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Birthday model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        Yii::$app->params['uploadPath'] = Yii::getAlias('@webroot') . '/media/upload/';   
        $model = new Birthday();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
 
            // store the source file name
            $model->filename = $image->name;
            $ext = end((explode(".", $image->name)));
 
            // generate a unique file name
            $model->picture = Yii::$app->security->generateRandomString().".{$ext}";
 
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadPath'] . $model->picture;
 

            if($model->save()){
                $image->saveAs($path);
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    ]);
                }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Birthday model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->params['uploadPath'] = Yii::getAlias('@webroot') . '/media/upload/'; 
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())  && $model->validate()) {
                   
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
 
            // store the source file name
            $model->filename = $image->name;
            $ext = end((explode(".", $image->name)));
 
            // generate a unique file name
            $model->picture = Yii::$app->security->generateRandomString().".{$ext}";
 
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadPath'] . $model->picture;
 
            if($model->save()){
                $image->saveAs($path);
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Birthday model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpload($id)
    {
        return $this->render('uploadimage');
    }
    
    
    /**
     * Finds the Birthday model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Birthday the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Birthday::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
