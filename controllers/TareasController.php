<?php

namespace app\controllers;

use Yii;
use app\models\Tareas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TareasController implements the CRUD actions for Tareas model.
 */
class TareasController extends Controller
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
     * Lists all Tareas models.
     * @return mixed
     */
    public function actionPendientes()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tareas::find()->where(['usuario' => Yii::$app->user->identity->id_usuario, 'done' =>'0']),
        ]);

        return $this->render('pendientes', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreadas()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tareas::find()->where(['creador' => Yii::$app->user->identity->id_usuario]),
        ]);

        return $this->render('creadas', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRealizadas()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tareas::find()->where(['usuario' => Yii::$app->user->identity->id_usuario, 'done' =>'1']),
        ]);

        return $this->render('realizadas', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    /**
     * Displays a single Tareas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionView1($id)
    {
        return $this->render('view_1', [
            'model' => $this->findModel($id),
        ]);
    }
    
        public function actionView3($id)
    {
        return $this->render('view_3', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    

    /**
     * Creates a new Tareas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tareas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view1', 'id' => $model->id_tarea]);
        }

 
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tareas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if ($model -> done){
                // vista view de tareas realizadas
                return $this->redirect(['view3', 'id' => $model->id_tarea]);
                
            }else {
                
                // vista view de tareas pendientes
                
                return $this->redirect(['view', 'id' => $model->id_tarea]);
                
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view1', 'id' => $model->id_tarea]);
        }

        return $this->render('update1', [
            'model' => $model,
        ]);
    }
    
    
    
    
    
    /**
     * Deletes an existing Tareas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete3($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['realizadas']);
    }
    
    
        public function actionDelete1($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['creadas']);
    }

    /**
     * Finds the Tareas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tareas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tareas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
