<form data-ajax class="form" action="<?= url_to('/admin/coins/edit/' . $coin['id']) ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="coins-id">ID: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $coin['id'] ?>" name="name" id="coins-id" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="coins-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $coin['name'] ?>" name="name" id="coins-name" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="coins-table">Tabela: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $coin['table'] ?>" name="table" id="coins-table" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="coins-column">Coluna (saldo): <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $coin['column'] ?>" name="column" id="coins-column" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="coins-foreign-key">Coluna (account): <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $coin['foreign_key'] ?>" name="foreign_key" id="coins-foreign-key" />
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>