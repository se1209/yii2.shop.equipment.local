<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

/* Контроллер для страниц сайта */
class PageController extends Controller
{
    /**
Для страницы со списком товаров
 */
    public function actionListproducts()
    {
        return $this->render('listproducts');
    }

    /**
    Для страницы новостей
     */
    public function actionNews()
    {
        return $this->render('news');
    }
}
