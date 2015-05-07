<form data-ajax class="form" method="post" action="<?= url_to('/admin/users/edit/' . $user['id']) ?>">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="user-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $user['name'] ?>" name="name" id="user-name" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-email">E-Mail:</label>
            </div>
            <div class="field">
                <input type="text" value="<?= $user['email'] ?>" name="email" id="user-email" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-username">Usuário: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $user['username'] ?>" name="username" id="user-username" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-password">Senha:</label>
            </div>
            <div class="field">
                <input type="password" name="password" id="user-password" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-super-user">Super usuário: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="checkbox"<?= $user['super_user'] ? ' checked="checked"' : '' ?> value="1" name="super_user" id="user-super-user" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-group">Grupo: </label>
            </div>
            <div class="field">
                <select name="group_id" id="user-group">
                    <? foreach ($groups as $group): ?>
                        <option value="<?= $group['id'] ?>"<?= $group['id'] == $user['group_id'] ? ' selected="selected"' : '' ?>><?= $group['name'] ?></option>
                    <? endforeach ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>