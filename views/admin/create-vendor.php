<form action="/admin/create-vendor" method="POST">
    <div class="login__section--inner">
        <div class="row row-cols-md-1 row-cols-1">
            <div class="col offset-md-0">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h3 mb-10">Create vendor</h2>
                    </div>
                    <div class="account__login--inner">
                        <label>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        </label>
                        <label>
                            <input name="name" class="account__login--input" type="text">
                        </label>
                        <button class="account__login--btn primary__btn" type="submit">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>