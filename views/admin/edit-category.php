<?php
/** @var \app\models\Category $category */
?>

<form action="/admin/edit-category" method="POST">
    <div class="login__section--inner">
        <div class="row row-cols-md-1 row-cols-1">
            <div class="col offset-md-0">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h3 mb-10">Edit category</h2>
                    </div>
                    <div class="account__login--inner">
                        <label>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        </label>
                        <label>
                            <input type="hidden" name="id" value="<?=$category->id?>">
                        </label>
                        <label>
                            Name
                            <input name="name" class="account__login--input" type="text" value="<?= $category->name?>">
                        </label>
                        <label>
                            Description
                            <textarea name="description" class="account__login--input"><?= $category->description?></textarea>
                        </label>
                        <button class="account__login--btn primary__btn" type="submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>