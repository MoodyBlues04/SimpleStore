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
                            <input type="hidden" name="role" value="<?=$role->name?>">
                        </label>
                        Permissions:
                        <?php foreach ($permissions as $idx => $permission): ?>
                            <label>
                                <?=$permission->name?>
                                <input
                                        type="checkbox"
                                        name="permissions[<?=$idx?>]"
                                        id="select-permissions"
                                        value="<?=$permission->name?>"
                                        <?= (\Yii::$app->authManager->hasChild($role, $permission)) ? 'checked' : ''?>>
                            </label>
                        <?php endforeach; ?>
                        <button class="account__login--btn primary__btn" type="submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>