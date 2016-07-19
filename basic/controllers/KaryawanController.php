<?php

namespace app\controllers;

use Yii;
use app\models\Karyawan;
use app\models\KaryawanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\AccessRule;
use app\models\User;
use yii\filters\AccessControl;

/**
 * KaryawanController implements the CRUD actions for Karyawan model.
 */
class KaryawanController extends Controller
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
                'only' => ['index','create','update','view'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete', 'view', 'index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::JABATAN_HRD,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::JABATAN_HRD,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::JABATAN_HRD,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow moderators and admins to update
                        'roles' => [
                            User::JABATAN_HRD,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::JABATAN_ADMIN
                        ],
                    ],
                ],
            ], 
        ];
    }

    /**
     * Lists all Karyawan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Karyawan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Karyawan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Karyawan();

        if ($model->load(Yii::$app->request->post())) {

            $model->ktp = UploadedFile::getInstance($model, 'ktp');
            $model->npwp = UploadedFile::getInstance($model, 'npwp');
            $model->bpjs = UploadedFile::getInstance($model, 'bpjs');
            $model->cv = UploadedFile::getInstance($model, 'cv');
            $model->transkrip = UploadedFile::getInstance($model, 'transkrip');
            $model->ijazah = UploadedFile::getInstance($model, 'ijazah');

            //dd($model);
            
            if($model->upload()){

                $model->save();

                return $this->redirect(['view', 'id' => $model->nik]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Karyawan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->ktp = UploadedFile::getInstance($model, 'ktp');
            $model->npwp = UploadedFile::getInstance($model, 'npwp');
            $model->bpjs = UploadedFile::getInstance($model, 'bpjs');
            $model->cv = UploadedFile::getInstance($model, 'cv');
            $model->transkrip = UploadedFile::getInstance($model, 'transkrip');
            $model->ijazah = UploadedFile::getInstance($model, 'ijazah');

            //dd($model);
            
            if($model->upload()){

                $model->save();

                return $this->redirect(['view', 'id' => $model->nik]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Karyawan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Karyawan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Karyawan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Karyawan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
