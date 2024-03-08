<?php
/**
 * @var \app\models\Category[] $categories
 * @var \app\models\Product[] $products
 * @var int $page
 * @var int $perPage
 */

$this->params['header'] = 'Shop';
$this->params['breadcrumbs'] = [
    [
        'label' => 'Shop',
        'url' => '/store',
    ],
];
?>

<!-- Start shop section -->
<section class="shop__section section--padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                    <div class="single__widget widget__bg">
                        <h2 class="widget__title position__relative h3">Search</h2>
                        <form class="widget__search--form" action="/store">
                            <label>
                                <input class="widget__search--form__input" placeholder="Search by" type="text" name="search">
                            </label>
                            <button class="widget__search--form__btn"  type="submit" aria-label="search button">
                                <svg class="widget__search--form__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                            </button>
                        </form>
                    </div>
                    <div class="single__widget widget__bg">
                        <h2 class="widget__title position__relative h3">Categories</h2>
                        <ul class="widget__categories--menu">
                            <?php foreach ($categories as $category): ?>
                                <li class="widget__categories--menu__list">
                                    <a href="/store?category=<?=$category->id?>">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="../img/product/small-product1.webp" alt="categories-img">
                                                <span class="widget__categories--menu__text"><?= $category->name?></span>
                                        </label>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="single__widget price__filter widget__bg">
                        <h2 class="widget__title position__relative h3">Filter By Price</h2>
                        <form class="price__filter--form" action="/store">
                            <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                <div class="price__filter--group">
                                    <label class="price__filter--label" for="Filter-Price-GTE1">From</label>
                                    <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                        <span class="price__filter--currency">$</span>
                                        <input class="price__filter--input__field border-0" id="Filter-Price-GTE1" name="min_price" type="number" placeholder="0" min="0" max="10000.00">
                                    </div>
                                </div>
                                <div class="price__divider">
                                    <span>-</span>
                                </div>
                                <div class="price__filter--group">
                                    <label class="price__filter--label" for="Filter-Price-LTE1">To</label>
                                    <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                        <span class="price__filter--currency">$</span>
                                        <input class="price__filter--input__field border-0" id="Filter-Price-LTE1" name="max_price" type="number" min="0" placeholder="10000.00" max="10000.00">
                                    </div>
                                </div>
                            </div>
                            <button class="price__filter--btn primary__btn" type="submit">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                    <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                        <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg>
                        <span class="widget__filter--btn__text">Filter</span>
                    </button>
                    <div class="product__view--mode d-flex align-items-center">
                        <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                            <label class="product__view--label">Sort By :</label>
                            <div class="select shop__header--select">
                                <select class="product__view--select">
                                    <option selected value="1">Sort by latest</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by  rating </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p class="product__showing--count"><?=count($products)?> results</p>
                </div>
                <div class="shop__product--wrapper">
                    <div class="tab_content">
                        <div id="product_grid" class="tab_pane active show">
                            <div class="product__section--inner product__grid--inner">
                                <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 mb--n30">
                                    <?php foreach ($products as $product): ?>
                                        <div class="col custom-col-2 mb-30">
                                            <article class="product__card">
                                                <div class="product__card--thumbnail">
                                                    <a class="product__card--thumbnail__link display-block" href="/store/show?id=<?=$product->id?>">
                                                        <img class="product__card--thumbnail__img product__primary--img display-block" src="../img/product/product1.webp" alt="product-img">
                                                        <img class="product__card--thumbnail__img product__secondary--img display-block" src="../img/product/product2.webp" alt="product-img">
                                                    </a>
                                                </div>
                                                <div class="product__card--content text-center">
                                                    <span class="product__card--meta__tag"><?= $product->category()->name?></span>
                                                    <h3 class="product__card--title">
                                                        <a href="/store/show?id=<?=$product->id?>"><?= $product->name?></a>
                                                    </h3>
                                                    <div class="product__card--price">
                                                        <span class="current__price">$<?=$product->price?></span>
                                                    </div>
                                                    <a class="product__card--btn primary__btn" href="cart/add?product=<?=$product->id?>">
                                                        Add To Card
                                                    </a>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End shop section -->