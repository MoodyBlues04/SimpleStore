<?php
/**
 * @var \app\models\Product $product
 */

$this->params['header'] = 'Product details';
$this->params['breadcrumbs'] = [
    [
        'label' => 'Shop',
        'url' => '/store',
    ],
    [
        'label' => 'Details',
        'url' => "/store/show?id={$product->id}",
    ],
];
?>

<section class="product__details--section section--padding">
    <div class="container">
        <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="product__details--media d-flex">
                    <div class="product__media--nav swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src="../../web/img/product/small-product1.webp" alt="product-nav-img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src="../../web/img/product/small-product2.webp" alt="product-nav-img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src="../../web/img/product/small-product3.webp" alt="product-nav-img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src="../../web/img/product/small-product4.webp" alt="product-nav-img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src="../../web/img/product/small-product1.webp" alt="product-nav-img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product__media--nav__items">
                                    <img class="product__media--nav__items--img" src="../../web/img/product/small-product2.webp" alt="product-nav-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__media--right">
                        <div class="product__media--preview  swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="../../web/img/product/big-product1.webp"><img class="product__media--preview__items--img" src="../../web/img/product/big-product1.webp" alt="product-media-img"></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox" href="../../web/img/product/big-product1.webp" data-gallery="product-media-preview">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 18 18">
                                                    <image  width="18" height="18" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAABHNCSVQICAgIfAhkiAAAAVhJREFUOE/llLtKA0EUhjdY+BD6ABaW3tIYTWEhiKKCCGIgqGhCgqXvoQFRQdBGERQvUaJFgilVRHwF8RWCWqzfD7OyjrPZ7R342HP2nP1n58yZSfm+/+F53ivUoAseoALtxirBIXiHLPSlEHrBaMGyEYzR+BXuwduHTgltYNzBKSxAM6HSAHknMAf9EqpjjEIGzmAK7mPE0sSrRkQ/cSWhIkZQE4kdwzxoAteQiCbMgeqqsSIhO3nEJK7xPLKC0/h7oT/5CbuEFByDCShDeKZNfC3lwp49SihiVdGv/6GQdm4WSlaxt/AvQ9vedteCZlsn68Aqr/pLPfenaVVsHcBt80HQbIv4txF75GravIQafKClDMKNq9kcgspXd0+CjlM1OLTXZu1LPNVwScYwSYcwA2kJPWJ8QQGekyiEcnqxd6BDQp8YupPOoRueYDdGME9c18gbjMv+BiJYeHc6xpjnAAAAAElFTkSuQmCC"/>
                                                </svg>
                                                <span class="visually-hidden">Media Gallery</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper__nav--btn swiper-button-next"></div>
                            <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product__details--info">
                    <h3 class="product__details--info__title mb-15"><?= $product->name?></h3>
                    <div class="product__details--info__price mb-10">
                        <span class="current__price">$<?=$product->price?></span>
                    </div>
                    <p class="product__details--info__desc mb-15">
                        <?=$product->preview?>
                    </p>
                    <div class="product__variant">
                        <div class="product__variant--list mb-15">
                            <a href="/cart/add?product=<?= $product->id?>" class="variant__buy--now__btn primary__btn" type="button" style="text-align: center">Buy it now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product__details--tab__section section--padding">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <ul class="product__tab--one product__details--tab d-flex mb-30">
                    <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Description</li>

                </ul>
                <div class="product__details--tab__inner border-radius-10">
                    <div class="tab_content">
                        <div id="description" class="tab_pane active show">
                            <div class="product__tab--content">
                                <div class="product__tab--content__step mb-30">
                                    <h2 class="product__tab--content__title h4 mb-10"><?=$product->name?></h2>
                                    <p class="product__tab--content__desc">
                                        <?=$product->description?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>