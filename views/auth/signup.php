<?php
$this->params['header'] = 'Signup Page';
$this->params['breadcrumbs'] = [
    [
        'label' => 'Home',
        'url' => 'home.html',
    ],
    [
        'label' => 'Signup Page',
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
                        <div class="account__login register">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                <p class="account__login--header__desc">Register here if you are a new customer</p>
                            </div>
                            <div class="account__login--inner">
                                <label>
                                    <input class="account__login--input" placeholder="Username" type="text">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Email Addres" type="email">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Password" type="password">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Confirm Password" type="password">
                                </label>
                                <label>
                                    <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>