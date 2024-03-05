<?php

namespace app\components;

use yii\base\Widget;

class ShoppingCartWidget extends Widget
{
    public function run(): string
    {
        return '<div class="offCanvas__minicart" tabindex="-1">
                    <div class="minicart__header ">
                        <div class="minicart__header--top d-flex justify-content-between align-items-center">
                            <h3 class="minicart__title"> Shopping Cart</h3>
                            <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                                <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                            </button>
                        </div>
                        <p class="minicart__header--desc">The organic foods products are limited</p>
                    </div>
                    <div class="minicart__product">
                        <div class="minicart__product--items d-flex">
                            <div class="minicart__thumbnail">
                                <a href="product-details.html"><img src="../../../web/img/product/small-product1.webp" alt="prduct-img"></a>
                            </div>
                            <div class="minicart__text">
                                <h4 class="minicart__subtitle"><a href="product-details.html">TAdvanced Analytic</a></h4>
                                <span class="color__variant"><b>Color:</b> Beige</span>
                                <div class="minicart__price">
                                    <span class="current__price">$125.00</span>
                                    <span class="old__price">$140.00</span>
                                </div>
                                <div class="minicart__text--footer d-flex align-items-center">
                                    <div class="quantity__box minicart__quantity">
                                        <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                        <label>
                                            <input type="number" class="quantity__number" value="1" data-counter />
                                        </label>
                                        <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                                    </div>
                                    <button class="minicart__product--remove" aria-label="minicart remove btn">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="minicart__product--items d-flex">
                            <div class="minicart__thumbnail">
                                <a href="product-details.html"><img src="../../../web/img/product/small-product2.webp" alt="prduct-img"></a>
                            </div>
                            <div class="minicart__text">
                                <h4 class="minicart__subtitle"><a href="product-details.html">Warrison Samuel.</a></h4>
                                <span class="color__variant"><b>Color:</b> Green</span>
                                <div class="minicart__price">
                                    <span class="current__price">$115.00</span>
                                    <span class="old__price">$130.00</span>
                                </div>
                                <div class="minicart__text--footer d-flex align-items-center">
                                    <div class="quantity__box minicart__quantity">
                                        <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                        <label>
                                            <input type="number" class="quantity__number" value="1" data-counter />
                                        </label>
                                        <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                                    </div>
                                    <button class="minicart__product--remove" aria-label="minicart remove btn">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="minicart__amount">
                        <div class="minicart__amount_list d-flex justify-content-between">
                            <span>Sub Total:</span>
                            <span><b>$240.00</b></span>
                        </div>
                        <div class="minicart__amount_list d-flex justify-content-between">
                            <span>Total:</span>
                            <span><b>$240.00</b></span>
                        </div>
                    </div>
                    <div class="minicart__button d-flex justify-content-center">
                        <a class="primary__btn minicart__button--link" href="cart.html">View cart</a>
                        <a class="primary__btn minicart__button--link" href="checkout.html">Checkout</a>
                    </div>
                </div>';
    }
}