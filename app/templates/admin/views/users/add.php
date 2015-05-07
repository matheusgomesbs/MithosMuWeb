<form data-ajax class="form" method="post" action="<?= url_to('/admin/users/add') ?>">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="user-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="name" id="user-name" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-email">E-Mail:</label>
            </div>
            <div class="field">
                <input type="text" name="email" id="user-email" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-username">Usuário: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="username" id="user-username" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-password">Senha: <span class="required">*</span></label>
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
                <input type="checkbox" name="super_user" value="1" id="user-super-user" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="user-group">Grupo: </label>
            </div>
            <div class="field">
                <select name="group_id" id="user-group">
                    <? foreach ($groups as $group): ?>
                        <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                    <? endforeach ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>