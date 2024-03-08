<?php
/**
 * @var \app\models\User $admin
 * @var \app\models\User $user
 * @var \yii\rbac\Role[] $roles
 */
?>

<form action="/admin/edit-user" method="POST">
    <div class="login__section--inner">
        <div class="row row-cols-md-1 row-cols-1">
            <div class="col offset-md-0">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h3 mb-10">Edit user: <?=$user->username?></h2>
                    </div>
                    <div class="account__login--inner">
                        <label>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        </label>
                        <label>
                            <input type="hidden" name="id" value="<?=$user->id?>">
                        </label>
                        <label>
                            <select name="role" id="select-role" class="account__login--input">
                                <option value="<?=null?>" selected></option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= $role->name ?>"><?= $role->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <button class="account__login--btn primary__btn" type="submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!--<div class="account__content">-->
<!--    <h2 class="account__content--title h3 mb-20">Addresses</h2>-->
<!--    <button class="new__address--btn primary__btn mb-25" type="button">Add a new address</button>-->
<!--    <div class="account__details two">-->
<!--        <h3 class="account__details--title h4">Default</h3>-->
<!--        <p class="account__details--desc">Admin <br> Dhaka <br> Dhaka 12119 <br> Bangladesh</p>-->
<!--        <a class="account__details--link" href="my-account-2.html">View Addresses (1)</a>-->
<!--    </div>-->
<!--    <div class="account__details--footer d-flex">-->
<!--        <button class="account__details--footer__btn" type="button">Edit</button>-->
<!--        <button class="account__details--footer__btn" type="button">Delete</button>-->
<!--    </div>-->
<!--</div>-->