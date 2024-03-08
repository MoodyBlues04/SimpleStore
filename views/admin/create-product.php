<?php
/**
 * @var \app\models\Category[] $categories
 * @var \app\models\Vendor[] $vendors
 */
?>

<form action="/admin/create-product" method="POST">
    <div class="login__section--inner">
        <div class="row row-cols-md-1 row-cols-1">
            <div class="col offset-md-0">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h3 mb-10">Create product</h2>
                    </div>
                    <div class="account__login--inner">
                        <label>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        </label>
                        <label>
                            Name
                            <input name="name" class="account__login--input" type="text">
                        </label>
                        <label>
                            Price
                            <input name="price" class="account__login--input" type="nuber">
                        </label>
                        <label>
                            Vendor
                            <select name="vendor" id="select-vendor" class="account__login--input">
                                <option value="<?=null?>" selected></option>
                                <?php foreach ($vendors as $category): ?>
                                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <label>
                            Category
                            <select name="category" id="select-role" class="account__login--input">
                                <option value="<?=null?>" selected></option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <label>
                            Preview
                            <input name="preview" class="account__login--input" type="text">
                        </label>
                        <label>
                            Description
                            <textarea name="description" class="account__login--input"></textarea>
                        </label>
                        <button class="account__login--btn primary__btn" type="submit">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>