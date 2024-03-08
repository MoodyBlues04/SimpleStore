<?php
/**
 * @var \yii\rbac\Role $role
 * @var \yii\rbac\Permission[] $permissions
 */
?>

<form action="/admin/edit-role" method="POST">
    <div class="login__section--inner">
        <div class="row row-cols-md-1 row-cols-1">
            <div class="col offset-md-0">
                <div class="account__login">
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h3 mb-10">Edit role: <?=$role->name?></h2>
                    </div>
                    <div class="account__login--inner">
                        <label>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                        </label>
                        <label>
                            <input type="hidden" name="id" value="<?=$role->name?>">
                        </label>
                        <label>
                            <select name="permissions" id="select-permissions" class="account__login--input">
<!--                                TODO checkbox dropdown -->
                                <option value="<?=null?>" selected></option>
                                <?php foreach ($permissions as $permission): ?>
                                    <option value="<?= $permission->name ?>"><?= $permission->name ?></option>
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