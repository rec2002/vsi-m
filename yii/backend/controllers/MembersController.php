<?php

namespace backend\controllers;

use Yii;
use common\modules\members\models\Members;
use backend\models\MembersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MembersController implements the CRUD actions for Members model.
 */
class MembersController extends Controller
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
     * Lists all Members models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Members model.
     * @param integer $id
     * @return mixed
     */
    /*
        public function actionView($id)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    */
        /**
         * Creates a new Members model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */

/*
    public function actionCreate()
    {
        $model = new Members();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
*/
    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

  /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
*/
    /**
     * Deletes an existing Members model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Members::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {





            $model->save('false');


            return $this->redirect(['index']);

        } else {
            $documents = ArrayHelper::index(Yii::$app->db->createCommand('SELECT id, name, file, member_id FROM member_documents WHERE member_id="'.$id.'" ')->queryAll(), 'id');
            return $this->renderAjax('_form', [
                'model' => $model, 'documents' => $documents
            ]);
        }
    }


    public function actionFile($member='0', $id = '0'){
        \common\components\MemberHelper::GetMemberDoc($member, $id);
    }


}