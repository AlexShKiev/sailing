<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use \yii\base\HttpException;
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $post = new Post;
        $data = $post->find()->all();
        echo $this->render('index', array(
            'data' => $data
        ));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');

    }
    public function actionRead($id=NULL)
    {
        if ($id === NULL)
            throw new HttpException(404, 'Not Found');

        $post = Post::find($id);

        if ($post === NULL)
            throw new HttpException(404, 'Document Does Not Exist');

        echo $this->render('read', array(
            'post' => $post
        ));
    }
    public function actionDelete($id=NULL)
    {
        $model = $this->loadModel($id);

        if (!$model->delete())
            Yii::$app->session->setFlash('error', 'Unable to delete model');

        $this->redirect($this->createUrl('site/index'));
    }
    public function actionCreate()
    {
        $model = new Post;
        if (isset($_POST['Post']))
        {
            $model->mail = $_POST['Post']['mail'];
            $model->pass = $_POST['Post']['pass'];
            $model->login = $_POST['Post']['login'];
            $model->birthdate = $_POST['Post']['birthdate'];

            if ($model->save())
                $this->redirect(['save', 'id' =>$model->id]);
//                Yii::$app->response->redirect(array('site/read', 'id' => $model->id));
        }

        echo $this->render('create', array(
            'model' => $model
        ));
    }
}
