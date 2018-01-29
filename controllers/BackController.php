<?php

namespace app\controllers;

use Yii;
use app\models\BackTareas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;

/**
 * BackController implements the CRUD actions for BackTareas model.
 */
class BackController extends Controller
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
            
        'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['*'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            
                        ],
            ],           
            
        ];
    }

    /**
     * Lists all BackTareas models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!User::isAdmin()){
            
           return $this->redirect(['site/login']);
            
        }else {
        
            $dataProvider = new ActiveDataProvider([
                'query' => BackTareas::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single BackTareas model.
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
     * Creates a new BackTareas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!User::isAdmin()){
            
            return $this->redirect(['site/login']);
            
        } else {
        
        $model = new BackTareas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tarea]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        
        }
    }

    /**
     * Updates an existing BackTareas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        if(!User::isAdmin()){
            
             return $this->redirect(['site/login']);
            
        } else {
            
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_tarea]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        
         }
    }

    /**
     * Deletes an existing BackTareas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)           
    {
        
        if(!User::isAdmin()){
            
             return $this->redirect(['site/login']);
            
        } else {
            
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        
        }
    }

    /**
     * Finds the BackTareas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BackTareas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BackTareas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
