<form data-ajax class="form" action="<?= url_to('/admin/services/edit/' . $service['service']) ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="service-<?= $service['id'] ?>-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="name" id="service-<?= $service['id'] ?>-name" value="<?= $service['name'] ?>" />
            </div>
        </div>

        <? if (!$service['allowed']): ?>
            <div class="row">
                <div class="label">
                    <label>VIP: <span class="required">*</span></label>
                </div>
                <div class="field">
                    <? foreach (config('vip.types', []) as $id => $name): ?>
                        <div class="mult-checkbox"><input type="checkbox" id="services-edit-<?= $service['id'] ?>-vip<?= $id ?>" name="viptype[<?= $id ?>]"<?= in_array($name, $service['viptypes']) ? ' checked' : '' ?> /> <label for="services-edit-<?= $service['id'] ?>-vip<?= $id ?>"><?= $name ?></label></div>
                    <? endforeach ?>
                </div>
            </div>
        <? endif ?>

    </div>

    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>