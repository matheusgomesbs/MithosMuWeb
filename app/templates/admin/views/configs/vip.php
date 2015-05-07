<form data-ajax class="form" action="<?= url_to('/admin/configs/vip') ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="config-vip-column-type">Coluna (VIP): <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" id="config-vip-column-type" value="<?= config('vip.column_type') ?>" name="column_type" />
            </div>
        </div>
        
        <div class="row">
            <div class="label">
                <label for="config-vip-column-expire">Coluna (Venc.): <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" id="config-vip-column-expire" value="<?= config('vip.column_expire') ?>" name="column_expire" />
            </div>
        </div>

        <div class="row">
            <div class="label">
                <label for="config-vip-types">Tipos:</label>
            </div>
            <div class="field container-add-vip-type">
                <? $i = 0; foreach (config('vip.types', []) as $code => $name): ?>
                    <input type="text" value="<?= $code ?>" name="types[<?= $i ?>][code]" placeholder="Código" style="width:35%" />
                    <input type="text" value="<?= $name ?>" name="types[<?= $i ?>][name]" placeholder="Nome do VIP" style="width:63%;float:right" />
                    <div style="margin-top:5px;"></div>
                <? $i++; endforeach ?>
                <input type="text" name="types[<?= count(config('vip.types')) + 1 ?>][code]" placeholder="Código" style="width:35%" />
                <input type="text" name="types[<?= count(config('vip.types')) + 1 ?>][name]" placeholder="Nome do VIP" style="width:63%;float:right" />
            </div>
            
            <div style="text-align:right;margin-top:5px">
                <a class="button add-vip-type" href="javascript:void(0)">Adicionar tipo</a>
            </div>
        </div>
        
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>