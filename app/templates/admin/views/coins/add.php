<form data-ajax class="form" action="<?= url_to('/admin/coins/add') ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="downloads-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="name" id="downloads-name" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-table">Tabela: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="table" id="downloads-table" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-column">Coluna (saldo): <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="column" id="downloads-column" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-foreign-key">Coluna (account): <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="foreign_key" id="downloads-foreign-key" />
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>