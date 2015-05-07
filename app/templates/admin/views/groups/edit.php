<form data-ajax class="form" method="post" action="<?= $base ?>/admin/groups/edit/<?= $group['id'] ?>">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="group-<?= $group['id'] ?>-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $group['name'] ?>" name="name" id="group-<?= $group['id'] ?>-name" />
            </div>
        </div>
        
        <div class="row">
            <div class="label">
                <label for="group-name">Acessos: </label>
            </div>
            <div class="field">
                <? foreach ($routes as $route): ?>
                    <div class="checkbox-two"><input value="<?= $route['id'] ?>"<?= in_array($route['id'], $access) ? ' checked="checked"' : '' ?> name="access[]" id="route-<?= $group['id'] ?>-<?= str_replace('.', '-', $route['id']) ?>" type="checkbox" /> <label for="route-<?= $group['id'] ?>-<?= str_replace('.', '-', $route['id']) ?>"><?= $route['title'] ?></label></div>
                <? endforeach ?>
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>