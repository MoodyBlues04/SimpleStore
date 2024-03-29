<?php

namespace app\widgets;

use yii\base\Widget;

class MainHeaderWidget extends Widget
{
    public function run(): string
    {
        return ' <div class="main__header position__relative header__sticky">
                        <div class="container">
                            <div class="main__header--inner d-flex justify-content-between align-items-center">
                                <div class="offcanvas__header--menu__open ">
                                    <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                                        <span class="visually-hidden">Offcanvas Menu Open</span>
                                    </a>
                                </div>
                                <div class="main__logo">
                                    <a class="main__logo--link" href="index.html"><img class="main__logo--img" src="../img/logo/nav-logo.webp" alt="logo-img"></a>
                                </div>
                                <div class="header__menu d-none d-lg-block">
                                    <nav class="header__menu--navigation">
                                        <ul class="d-flex">
                                            <li class="header__menu--items">
                                                <a class="header__menu--link" href="/store">Home </a>
                                            </li>
                                            <li class="header__menu--items">
                                                <a class="header__menu--link" href="/store">Shop </a>
                                            </li>
                                            <li class="header__menu--items">
                                                <a class="header__menu--link" href="/store">About US </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header__account">
                                    <ul class="d-flex">
                                        <li class="header__account--items  header__account--search__items d-md-none">
                                            <a class="header__account--btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                                                <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                                                <span class="visually-hidden">Search</span>
                                            </a>
                                        </li>
                                        <li class="header__account--items">
                                            <a class="header__account--btn" href="/profile">
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">My Account</span>
                                            </a>
                                        </li>
                                        <li class="header__account--items">
                                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18.897" height="21.565" viewBox="0 0 18.897 21.565">
                                                    <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"/>
                                                </svg>
                                                <span class="items__count">02</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}