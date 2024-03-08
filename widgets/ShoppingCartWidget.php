<?php

namespace app\widgets;

use app\models\Product;
use yii\base\Widget;

class ShoppingCartWidget extends Widget
{
    /** @var Product[] */
    private array $products;

    public function __construct($config = [])
    {
        parent::__construct($config);

        $productsIds = \Yii::$app->getSession()->get('products', []);
        $this->products = Product::find()->where(['in', 'id', $productsIds])->all();
    }

    public function run(): string
    {
        $productsContents = '';
        foreach ($this->products as $product) {
            $productsContents .= "<div class='minicart__product'>
                <div class='minicart__product--items d-flex'>
                    <div class='minicart__thumbnail'>
                        <a href='product-details.html'><img src='../../../web/img/product/small-product1.webp' alt='prduct-img'></a>
                    </div>
                    <div class='minicart__text'>
                        <h4 class='minicart__subtitle'><a href='/store/show?ud={$product->id}'>{$product->name}</a></h4>
                        <div class='minicart__price'>
                            <span class='current__price'>\${$product->price}</span>
                        </div>
                        <div class='minicart__text--footer d-flex align-items-center'>
                            <a role='button' href='/cart/remove?product={$product->id}' class='minicart__product--remove' aria-label='minicart remove btn'>Remove</a>
                        </div>
                    </div>
                </div>
            </div>";
        }

        return '<div class="offCanvas__minicart" tabindex="-1">
                    <div class="minicart__header ">
                        <div class="minicart__header--top d-flex justify-content-between align-items-center">
                            <h3 class="minicart__title"> Shopping Cart</h3>
                            <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                                <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                            </button>
                        </div>
                    </div>
                    '. $productsContents . '
                    <div class="minicart__amount">
                        <div class="minicart__amount_list d-flex justify-content-between">
                            <span>Total:</span>
                            <span><b>$240.00</b></span>
                        </div>
                    </div>
                    <div class="minicart__button d-flex justify-content-center">
                        <a class="primary__btn minicart__button--link" href="/cart">View cart</a>
                        <a class="primary__btn minicart__button--link" href="/cart/checkout">Checkout</a>
                    </div>
                </div>';
    }

    private function getTotalPrice(): int
    {
        return array_sum(array_map(fn ($product) => $product->price, $this->products));
    }
}