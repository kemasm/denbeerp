<?php

namespace app\controllers;

use Yii;
use app\models\Hutang;
use app\models\HutangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AccessRule;
use app\models\User;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * HutangController implements the CRUD actions for Hutang model.
 */
class HutangController extends Controller
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
                'only' => ['create', 'update', 'delete', 'view', 'index', 'approve', 'disaprove'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::JABATAN_USER,
                            User::JABATAN_HRD,
                            User::JABATAN_MANAGER,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::JABATAN_USER,
                            User::JABATAN_HRD,
                            User::JABATAN_MANAGER,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::JABATAN_USER,
                            User::JABATAN_HRD,
                            User::JABATAN_MANAGER,
                            User::JABATAN_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow moderators and admins to update
                        'roles' => [
                            User::JABATAN_USER,
                            User::JABATAN_HRD,
                            User::JABATAN_MANAGER,
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
                    [
                        'actions' => ['approve'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::JABATAN_MANAGER,
                            User::JABATAN_ADMIN,
                            User::JABATAN_HRD
                        ],
                    ],
                    [
                        'actions' => ['disapprove'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::JABATAN_MANAGER,
                            User::JABATAN_ADMIN,
                            User::JABATAN_HRD
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Hutang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HutangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hutang model.
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
     * Creates a new Hutang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hutang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hutang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $jabatan = Yii::$app->user->identity->jabatan;

        if($jabatan == 'admin' || Yii::$app->user->id == $model->nik)
        {
            if ($model->load(Yii::$app->request->post())) {

                $model->file_hutang = UploadedFile::getInstance($model, 'file_hutang');

                if($model->upload()){

                    $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Hutang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $jabatan = Yii::$app->user->identity->jabatan;
        //if($jabatan == 'admin' || $jabatan == 'manager'){

            $model->approval();

            $model->save();
        //}
        //d($model);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionDisapprove($id)
    {
        $model = $this->findModel($id);
        $jabatan = Yii::$app->user->identity->jabatan;
        //if($jabatan == 'admin' || $jabatan == 'manager'){

            $model->disapproval();

            $model->save();
        //}

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hutang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hutang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hutang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
