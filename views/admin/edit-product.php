<?php
/**
 * @var \app\models\Product $product
 * @var \app\models\Category[] $categories
 * @var \app\models\Vendor[] $vendors
 */
?>

<form action="/admin/edit-product" method="POST">
    <div class="login__section--inner">
        <div class="row row-cols-md-1 row-cols-1">
            <div class="col offset-md-0">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h3 mb-10">Edit product</h2>
                    </div>
                    <div class="account__login--inner">
                        <label>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        </label>
                        <label>
                            <input type="hidden" name="id" value="<?=$product->id?>">
                        </label>
                        <label>
                            Name
                            <input name="name" class="account__login--input" type="text" value="<?=$product->name?>">
                        </label>
                        <label>
                            Vendor
                            <select name="vendor" id="select-vendor" class="account__login--input">
                                <?php foreach ($vendors as $vendor): ?>
                                    <option
                                        value="<?= $vendor->id ?>"
                                        <?=$product->vendor_id === $vendor->id ? 'selected' : ''?>>
                                        <?= $vendor->name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <label>
                            Category
                            <select name="category" id="select-role" class="account__login--input">
                                <?php foreach ($categories as $category): ?>
                                    <option
                                        value="<?= $category->id ?>"
                                        <?=$product->category_id === $category->id ? 'selected' : ''?>>
                                        <?= $category->name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <label>
                            Preview
                            <input name="preview" class="account__login--input" type="text" value="<?= $product->preview?>">
                        </label>
                        <label>
                            Description
                            <textarea name="description" class="account__login--input"><?= $product->description?></textarea>
                        </label>
                        <button class="account__login--btn primary__btn" type="submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>