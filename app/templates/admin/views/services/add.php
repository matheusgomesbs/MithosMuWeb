<form data-ajax class="form" action="<?= url_to('/admin/services/add') ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="downloads-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="name" id="downloads-name" />
            </div>
        </div>

    </div>

    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>