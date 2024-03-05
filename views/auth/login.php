<?php
    $this->params['header'] = 'Login Page';
    $this->params['breadcrumbs'] = [
        [
            'label' => 'Home',
            'url' => 'home.html',
        ],
        [
            'label' => 'Login Page',
            'url' => 'test',
        ],
    ];
?>

<div class="login__section section--padding">
    <div class="container">
        <form action="#">
            <div class="login__section--inner">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col offset-md-3">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                <p class="account__login--header__desc">Login if you area a returning customer.</p>
                            </div>
                            <div class="account__login--inner">
                                <label>
                                    <input class="account__login--input" placeholder="Email Addres" type="email">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Password" type="password">
                                </label>
                                <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check1">
                                            Remember me</label>
                                    </div>
                                </div>
                                <button class="account__login--btn primary__btn" type="submit">Login</button>
                                <p class="account__login--signup__text">
                                    Don,t Have an Account?
                                    <button type="button">Sign up now</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>