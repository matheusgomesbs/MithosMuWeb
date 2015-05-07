<form data-ajax class="form" action="<?= url_to('/admin/downloads/edit/' . $download['id']) ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="downloads-name">Nome: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $download['name'] ?>" name="name" id="downloads-name" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-size">Tamanho: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $download['size'] ?>" name="size" id="downloads-size" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-desc">Descrição:</label>
            </div>
            <div class="field">
                <textarea name="desc" id="downloads-desc"><?= $download['desc'] ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="downloads-links">Links:</label>
            </div>
            <div class="field container-add-link">
                <? $i = 0; foreach ($download['links'] as $name => $link): ?>
                    <input type="text" value="<?= $name ?>" name="links[<?= $i ?>][name]" style="width:35%" />
                    <input type="text" value="<?= $link ?>" name="links[<?= $i ?>][link]" style="width:63%;float:right" />
                    <div style="margin-top:5px;"></div>
                <? $i++; endforeach ?>
                <input type="text" placeholder="Nome" name="links[<?= count($download['links']) + 1 ?>][name]" style="width:35%" />
                <input type="text" placeholder="Link" name="links[<?= count($download['links']) + 1 ?>][link]" style="width:63%;float:right" />
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