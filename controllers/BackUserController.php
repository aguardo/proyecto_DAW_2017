<?php

namespace app\controllers;

use Yii;
use app\models\BackUsuario;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;

/**
 * BackUserController implements the CRUD actions for BackUsuario model.
 */
class BackUserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BackUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!User::isAdmin()){
            
           return $this->redirect(['site/login']);
            
        }else {
        
        
        
        
        $dataProvider = new ActiveDataProvider([
            'query' => BackUsuario::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
        
        }
    }

    /**
     * Displays a single BackUsuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
         if(!User::isAdmin()){
            
           return $this->redirect(['site/login']);
            
        }else {
            
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);

        
        }
    }

    /**
     * Creates a new BackUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        if(!User::isAdmin()){
            
           return $this->redirect(['site/login']);
            
        }else {
            
                
            $model = new BackUsuario();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_usuario]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        
        }
    }

    /**
     * Updates an existing BackUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
         if(!User::isAdmin()){
            
           return $this->redirect(['site/login']);
            
        }else {
            
        
        
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_usuario]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        
        }
    }

    /**
     * Deletes an existing BackUsuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         if(!User::isAdmin()){
            
           return $this->redirect(['site/login']);
            
        }else {
        
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        
        }
    }

    /**
     * Finds the BackUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BackUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BackUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
