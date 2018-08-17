<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Список товаров';
?>

<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
    <h3>Фильтры</h3>
    <form>
        <label>Цена / руб</label>
        <div class="filter_price">
            <input type="text" value="0">
            -
            <input type="text" value="10000">
        </div>
        <label>Объем / л</label>
        <div class="filter_check">
            <p><input type="checkbox"/>10</p>
            <p><input type="checkbox"/>20</p>
            <p><input type="checkbox"/>30</p>
        </div>

        <button type="submit">Подобрать</button>
    </form>
</div>

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

    <div class="short_description">
        
        <img src="images/<?= $categories['img']; ?>">
        <div>
            <h2><?= $categories['name']; ?></h2>
            <p><?= $categories['description']; ?></p>
        </div>
    </div>
    <div class="row content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h1>Рюкзаки</h1>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 value_prod">
                    <p>В наличии: <?= $count_products; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">

                    <?php $form = ActiveForm::begin(); ?>
                    <p><strong>Сортировка по:</strong><?php echo $form->field($model, 'str')->dropDownList([
                            '0' => 'Цене, по возрастанию',
                            '1' => 'Цене, по убыванию',
                            '2' => 'Названию товара, от А до Я',
                            '3' => 'Названию товара, от Я до А',
                        ],$params = [
                                'prompt' => '--',
                            ]
                        );?></p>
                    <p><strong>Показать:</strong><?php echo $form->field($model, 'number')->dropDownList([
                            '12' => '12', '24' => '24', '48' => '48'],
                            $params = [
                            'options' => ['12' =>['Selected' => true]],
                        ]);?></p>
                    <?php echo Html::submitButton('Go');?>
                    <?php ActiveForm::end(); ?>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">
                    <p><strong>Вид:</strong>

                        <?php
                            if ($view == 1)
                            {
                                $class2 = 'active';
                            }
                            else
                            {
                                $class1 = 'active';
                            }
                        ?>

                        <a href="<?= Url::toRoute(['page/listproducts', 'id' => $categories['id']]); ?>" class="<?= @$class1; ?>"><i class="glyphicon glyphicon-th-list"></i><span>Список</span></a>
                        <a href="<?= Url::toRoute(['page/listproducts', 'id' => $categories['id'], 'view' => '1']); ?>" class="<?= @$class2; ?>"><i class="glyphicon glyphicon-th"></i><span>Сетка</span></a>
                    </p>
                </div>
            </div>
        </div>

        <?php
            foreach ($products_array as $product_array)
            {
                if ($view == 1)
                {
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 view_list">
                        <div class="product">
                            <a href="#" class="product_img">
                                <?php
                                if ($product_array['price_old'] != "") {
                                    ?>
                                    <span>- <?php echo 100-intval($product_array['price']*100/$product_array['price_old']); ?>%</span>
                                    <?php
                                }
                                ?>
                                <img src="images/<?= $product_array['img']; ?>">
                            </a>
                            <a href="<?= Url::toRoute(['page/product', 'id' => $product_array['id']]); ?>" class="product_title">
                                <?= $product_array['name']; ?>
                            </a>
                            <div class="product_price">
                                <span class="price"><?= $product_array['price']; ?> руб</span>
                                <?php
                                if ($product_array['price_old'] != "") {
                                    ?>
                                    <span class="price_old"><?= $product_array['price_old']; ?> руб</span>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="desc_prod">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>Объём, л</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <td>Вес, кг</td>
                                        <td>1,2</td>
                                    </tr>
                                    <tr>
                                        <td>Высота, см</td>
                                        <td>50</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="product_btn">
                                <a href="<?= Url::toRoute(['page/cart', 'id' => $product_array['id']]); ?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                <a href="<?= Url::toRoute(['page/listorder', 'id' => $product_array['id']]); ?>" class="mylist">Список желаний</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                        <div class="product">
                            <a href="#" class="product_img">
                                <?php
                                if ($product_array['price_old'] != "") {
                                    ?>
                                    <span>- <?php echo 100-intval($product_array['price']*100/$product_array['price_old']); ?>%</span>
                                    <?php
                                }
                                ?>
                                <img src="images/<?= $product_array['img']; ?>">
                            </a>
                            <a href="<?= Url::toRoute(['page/product', 'id' => $product_array['id']]); ?>" class="product_title">
                                <?= $product_array['name']; ?>
                            </a>
                            <div class="product_price">
                                <span class="price"><?= $product_array['price']; ?> руб</span>
                                <?php
                                if ($product_array['price_old'] != "") {
                                    ?>
                                    <span class="price_old"><?= $product_array['price_old']; ?> руб</span>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="product_btn">
                                <a href="<?= Url::toRoute(['page/cart', 'id' => $product_array['id']]); ?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                <a href="<?= Url::toRoute(['page/listorder', 'id' => $product_array['id']]); ?>" class="mylist">Список желаний</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>

        <!--<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="images/prod4.jpg">
                </a>
                <a href="#" class="product_title">Рюкзак туристический</a>
                <div class="product_price">
                    <span class="price">3500 руб</span>
                    <span class="price_old">3700 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="images/prod2.jpg">
                </a>
                <a href="#" class="product_title">Рюкзак туристический</a>
                <div class="product_price">
                    <span class="price">3500 руб</span>
                    <span class="price_old">3700 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="images/prod3.jpg">
                </a>
                <a href="#" class="product_title">Рюкзак туристический</a>
                <div class="product_price">
                    <span class="price">3500 руб</span>
                    <span class="price_old">3700 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Рюкзак туристический</a>
                <div class="product_price">
                    <span class="price">3500 руб</span>
                    <span class="price_old">3700 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="images/prod2.jpg">
                </a>
                <a href="#" class="product_title">Рюкзак туристический</a>
                <div class="product_price">
                    <span class="price">3500 руб</span>
                    <span class="price_old">3700 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>-->
    </div>
</div>
