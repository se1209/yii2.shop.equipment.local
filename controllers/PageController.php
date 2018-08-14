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
use app\models\Products;

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
            $categories = Categories::find()->where(['id' => $_GET['id']])->asArray()->one();

            if ($categories)
            {
                $products_array = Products::find()->where(['category' => $_GET['id']])->asArray()->all();
                $count_products = count($products_array);
                return $this->render('listproducts', compact('categories', 'products_array', 'count_products'));
            }
        }
        else
        {
            return $this->redirect(['page/catalog']);
        }
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
     * Для страницы "Карточка товара";
     */
    public function actionProduct()
    {
        return $this->render('product');
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

    /**
     * Для страницы "Корзина"
     */
    public function actionCart()
    {
        return $this->render('cart');
    }

    /**
     * Для страницы "Список желаний"
     */
    public function actionListorder()
    {
        return $this->render('listorder');
    }
}
