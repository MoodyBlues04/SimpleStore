<?php
$this->params['header'] = 'Checkout';
$this->params['breadcrumbs'] = [
    [
        'label' => 'Home',
        'url' => '/store',
    ],
    [
        'label' => 'Checkout',
    ],
];

/**
 * @var \app\models\Product[] $products
 */

$totalPrice = array_sum(array_map(fn (\app\models\Product $product) => $product->price, $products));
?>

<!-- Start checkout page area -->
<div class="checkout__page--area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 offset-3">
                <aside class="checkout__sidebar sidebar border-radius-10">
                    <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                            <?php foreach ($products as $product): ?>
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a class="display-block" href="/store/show?id=<?=$product->id?>"><img class="display-block border-radius-5" src="../../web/img/product/small-product1.webp" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity">1</span>
                                            </div>
                                            <div class="product__description">
                                                <h4 class="product__description--name"><a href="/store/show?id=<?=$product->id?>"><?=$product->name?></a></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">$<?=$product->price?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="checkout__total">
                        <table class="checkout__total--table">
                            <tbody class="checkout__total--body">
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Subtotal </td>
                                <td class="checkout__total--amount text-right">$<?=$totalPrice?></td>
                            </tr>
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Shipping</td>
                                <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                            </tr>
                            </tbody>
                            <tfoot class="checkout__total--footer">
                            <tr class="checkout__total--footer__items">
                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$<?=$totalPrice?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment__history mb-30">
                        <h3 class="payment__history--title mb-20">Payment</h3>
                        <ul class="payment__history--inner d-flex">
                            <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                            <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                            <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                        </ul>
                    </div>
                    <button class="checkout__now--btn primary__btn" type="submit">Checkout Now</button>
                </aside>
            </div>

        </div>
    </div>
</div>