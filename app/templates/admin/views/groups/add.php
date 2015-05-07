<form data-ajax class="form" method="post" action="<?= $base ?>/admin/groups/add">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="group-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="name" id="group-name" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="group-name">Acessos: </label>
            </div>
            <div class="field">
                <? foreach ($routes as $route): ?>
                    <div class="checkbox-two"><input value="<?= $route['id'] ?>" name="access[]" id="route-<?= str_replace('.', '-', $route['id']) ?>" type="checkbox" /> <label for="route-<?= str_replace('.', '-', $route['id']) ?>"><?= $route['title'] ?></label></div>
                <? endforeach ?>
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>