<?php

namespace app\controllers;

use app\models\Pengarang;
use app\models\PengarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;

/**
 * PengarangController implements the CRUD actions for Pengarang model.
 */
class PengarangController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pengarang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PengarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengarang model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pengarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pengarang();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                
                $model ->fotoFile = UploadedFile::getInstance($model, 'fotoFile');
                //VarDumper::dump($model);
                //exit;

                if($model->validate() && !empty($model->fotoFile))
                {
                    $nama = $model->id.'.'.$model->fotoFile->extension;
                    $model->foto = $nama;
                    $model->save();
                    $model->fotoFile->saveAs('images/'.$nama);
                }
                else{
                    $model->save();
                }
                //VarDumper::dump($model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $model ->fotoFile = UploadedFile::getInstance($model, 'fotoFile');
                //VarDumper::dump($model);
                //exit;

                if($model->validate() && !empty($model->fotoFile))
                {
                    $nama = $model->id.'.'.$model->fotoFile->extension;
                    $model->foto = $nama;
                    $model->save();
                    $model->fotoFile->saveAs('images/'.$nama);
                }
                else{
                    $model->save();
                }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink('images/'.$model->foto);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pengarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengarang::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
