<form data-ajax class="form" action="<?= url_to('/admin/downloads/add') ?>" method="post">
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
                <label for="downloads-size">Tamanho: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" name="size" id="downloads-size" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-desc">Descrição:</label>
            </div>
            <div class="field">
                <textarea name="desc" id="downloads-desc"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-links">Links:</label>
            </div>
            <div class="field container-add-link">
                <input type="text" placeholder="Nome" name="links[0][name]" style="width:35%" />
                <input type="text" placeholder="Link" name="links[0][link]" style="width:63%;float:right" />
            </div>
            
            <div style="text-align:right;margin-top:5px">
                <a class="button add-link" href="javascript:void(0)">Adicionar link</a>
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>