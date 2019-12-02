<?php
namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return 'api';
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams,'');
        if ($token=$model->auth()){
            return $token;
        }
        else{
            return $model;
        }
    }

    public function verbs()
    {
        return [
            'login'=>['post'],
        ];
    }
}
