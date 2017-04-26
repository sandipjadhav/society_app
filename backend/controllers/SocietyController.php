<?php

namespace backend\controllers;

use Yii;
use app\models\Society;
use app\models\SocietySearch;
use app\models\Address;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * SocietyController implements the CRUD actions for Society model.
 */
class SocietyController extends Controller
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
     * Lists all Society models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SocietySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Society model.
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
     * Creates a new Society model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Society();
        $modelsAddress = [new Address];

        if ($model->load(Yii::$app->request->post())){
            $oldIDs = ArrayHelper::map($modelsAddress, 'id', 'id');
            $modelsAddress = Model::createMultiple(Address::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAddress),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;



            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    Address::deleteAll(['id' => $deletedIDs]);
                    foreach ($modelsAddress as $modelAddress) {
                        if (! ($flag = $modelAddress->save(false))) {
                            $transaction->rollBack();
                            break;
                        }else{
                            $model->address_id = $modelAddress->id;
                            if (!$flag = $model->save(false)) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {

                    echo $e->getMessage();

                    $transaction->rollBack();
                }
            }


        }

        return $this->render('update', [
            'model' => $model,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);
    }

    /**
     * Updates an existing Society model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelsAddress = [$model->address];


        if ($model->load(Yii::$app->request->post())){
            $modelsAddress = Model::createMultiple(Address::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    foreach ($modelsAddress as $modelAddress) {
                        if (! ($flag = $modelAddress->save(false))) {
                            $transaction->rollBack();
                            break;
                        }else{
                            $model->address_id = $modelAddress->id;
                            if (!$flag = $model->save(false)) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {

                    echo $e->getMessage();

                    $transaction->rollBack();
                }
            }
        }else{
            return $this->render('update', [
                'model' => $model,
                'modelsAddress' => [$model->address]
            ]);
        }
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('update', [
                'model' => $model,
                'modelsAddress' => [$model->address]
            ]);
        }*/
    }

    /**
     * Deletes an existing Society model.
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
     * Finds the Society model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Society the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Society::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
