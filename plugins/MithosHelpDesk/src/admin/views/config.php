<form data-ajax class="form" action="<?= url_to('/admin/helpdesk/config') ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="config-news-limit">Departamentos</label>
            </div>
            <div class="field container-add-department">
                <? foreach (config('helpdesk.departments', []) as $department): ?>
                    <input type="text" style="margin-bottom:3px;" value="<?= $department ?>" name="helpdesk_department[]" />
                <? endforeach ?>
                <input type="text" name="helpdesk_department[]" />
            </div>
            <div style="text-align:right;margin-top:2px;margin-bottom:5px;">
                <a class="button add-department" href="javascript:void(0)">Adicionar novo</a>
            </div>
        </div>
        
        <div class="row">
            <div class="label">
                <label for="config-helpdesk-rules">Regras (HTML)</label>
            </div>
            <div class="field">
                <textarea id="config-helpdesk-rules" style="height:200px" name="helpdesk_rules"><?= config('helpdesk.rules') ?></textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="label">
                <label for="config-helpdesk-max-char-message">Máximo carc.</label>
            </div>
            <div class="field">
                <input type="text" value="<?= config('helpdesk.max_char_message', 400) ?>" name="helpdesk_max_char_message" id="config-helpdesk-max-char-message" />
            </div>
        </div>
        
        <div class="row">
            <div class="label">
                <label for="config-helpdesk-timeout">Timeout (seg.)</label>
            </div>
            <div class="field">
                <input type="text" value="<?= config('helpdesk.timeout') ?>" name="helpdesk_timeout" id="config-helpdesk-timeout" />
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>