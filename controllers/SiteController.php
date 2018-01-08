<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Ticket;
use app\models\TicketSearch;
use app\models\Masuk;
use app\models\MasukSearch;
use app\models\Keluar;
use app\models\KeluarSearch;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use mPDF;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout','index', 'checkmasuk', 'checkkeluar', 'checkticket', 'checkticketkeluar', 'ticket', 'cetakticket', 'update' ,'delete', 'masuk', 'keluar'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionCetakticket() 
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $mpdf = new mPDF('utf-8', 'A4-P');
        $mpdf->WriteHTML($this->render('cetakticket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]));
        $mpdf->Output();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('ticket');
        } else {
            return $this->render('ticket_update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lembur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['ticket']);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionCheckmasuk()
    {
        $model = new Masuk();

        $model->load(Yii::$app->request->post());
        $model->save();

        return $this->render('check_masuk', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionCheckkeluar()
    {
        $model = new Keluar();

        $model->load(Yii::$app->request->post());
        $model->save();

        return $this->render('check_keluar', [
            'model' => $model,
        ]);
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionTicket()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('ticket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionCheckticket()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('checkticket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionCheckticketkeluar()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('checkticketkeluar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
