<?php
/**
 * Created by PhpStorm.
 * User: SE
 * Date: 10.08.2018
 * Time: 16:24
 */
?>

<?php

/* @var $this yii\web\View */

$this->title = 'Каталог';

use yii\helpers\Url;
?>

<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 left_banner_menu">
    Баннерное меню
</div>

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 catalog">
    <div class="row content">
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
            <a href="<?= Url::toRoute('page/listproducts'); ?>"><img src="images/prod1.jpg"></a>
            <a href="<?= Url::toRoute('page/listproducts'); ?>">Снаряжение</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
            <a href="<?= Url::toRoute('page/listproducts'); ?>"><img src="images/prod2.jpg"></a>
            <a href="<?= Url::toRoute('page/listproducts'); ?>">Обувь</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
            <a href="<?= Url::toRoute('page/listproducts'); ?>"><img src="images/prod4.jpg"></a>
            <a href="<?= Url::toRoute('page/listproducts'); ?>">Одежда</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
            <a href="<?= Url::toRoute('page/listproducts'); ?>"><img src="images/prod4.jpg"></a>
            <a href="<?= Url::toRoute('page/listproducts'); ?>">Сувениры</a>
        </div>
    </div>
</div>
