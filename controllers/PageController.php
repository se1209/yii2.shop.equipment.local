<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Categories;

/* Контроллер для страниц сайта */
class PageController extends Controller
{
    /**
     * Для страницы со списком товаров
     */
    public function actionListproducts()
    {
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $categories = Categories::find()->where(['id' => 1])->asArray()->one();

            if (count($categories) > 0)
            {
                return $this->render('listproducts', compact('categories'));
            }
        }
        //else
        //{
            return $this->redirect(['page/catalog']);
        //}
    }

    /**
     * Для страницы "Каталог";
     */
    public function actionCatalog()
    {
        $categories = Categories::find()->asArray()->all();
        return $this->render('catalog', compact('categories'));
    }

    /**
     * Для страницы новостей
     */
    public function actionNews()
    {
        return $this->render('news');
    }

    /**
     * Для страницы с контактами;
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /**
     * Для страницы входа;
     */
    public function actionLogin()
    {
        return $this->render('login');
    }

    /**
     * Для страницы регистрации;
     */
    public function actionRegistration()
    {
        return $this->render('registration');
    }

    /**
     * Для страницы "Обратная связь";
     */
    public function actionFormcontact()
    {
        return $this->render('formcontact');
    }
}
