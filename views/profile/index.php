<?php
/**
 * @var \app\models\User $user
 */

$this->params['header'] = 'My Account';
$this->params['breadcrumbs'] = [
    [
        'label' => 'Home',
        'url' => 'home.html',
    ],
    [
        'label' => 'My account',
        'url' => 'test',
    ],
];
?>

<section class="my__account--section section--padding">
    <div class="container">
        <p class="account__welcome--text">Hello, <b><?= $user->username ?></b> welcome to your dashboard!</p>
        <div class="my__account--section__inner border-radius-10 d-flex">
            <div class="account__left--sidebar">
                <h2 class="account__content--title h3 mb-20">My Profile</h2>
                <ul class="account__menu">
                    <li class="account__menu--list">
                        <a href="my-account.html">Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="account__wrapper">
                <div class="account__content">
                    <h2 class="account__content--title h3 mb-20">Orders History</h2>
                    <div class="account__table--area">
                        <table class="account__table">
                            <thead class="account__table--header">
                            <tr class="account__table--header__child">
                                <th class="account__table--header__child--items">Order</th>
                                <th class="account__table--header__child--items">Date</th>
                                <th class="account__table--header__child--items">Payment Status</th>
                                <th class="account__table--header__child--items">Fulfillment Status</th>
                                <th class="account__table--header__child--items">Total</th>
                            </tr>
                            </thead>
                            <tbody class="account__table--body mobile__none">
                            <tr class="account__table--body__child">
                                <td class="account__table--body__child--items">#2014</td>
                                <td class="account__table--body__child--items">March 10, 2022</td>
                                <td class="account__table--body__child--items">Paid</td>
                                <td class="account__table--body__child--items">Unfulfilled</td>
                                <td class="account__table--body__child--items">$40.00 USD</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <br>

<!--                TODO use form for admin dashboard -->
                <div class="account__content">
                    <h2 class="account__content--title h3 mb-20">Addresses</h2>
                    <button class="new__address--btn primary__btn mb-25" type="button">Add a new address</button>
                    <div class="account__details two">
                        <h3 class="account__details--title h4">Default</h3>
                        <p class="account__details--desc">Admin <br> Dhaka <br> Dhaka 12119 <br> Bangladesh</p>
                        <a class="account__details--link" href="my-account-2.html">View Addresses (1)</a>
                    </div>
                    <div class="account__details--footer d-flex">
                        <button class="account__details--footer__btn" type="button">Edit</button>
                        <button class="account__details--footer__btn" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>