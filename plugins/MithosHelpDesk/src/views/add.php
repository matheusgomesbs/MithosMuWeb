<h1 class="title">Atendimento</h1>

<?= config('helpdesk.rules') ?>

<h2 class="title">Abrir novo ticket</h2>
<form data-ajax action="<?= url_to('/support/tickets/add') ?>" method="POST" class="form form-action">
    <div class="box">
        <div class="row">
            <div class="label">
                <label for="department">Departamento <span class="required">*</span></label>
            </div>
            <div class="field">
                <select name="department" id="department">
                    <? foreach (config('helpdesk.departments', []) as $department): ?>
                        <option value="<?= $department ?>"><?= $department ?></option>
                    <? endforeach ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="label">
                <label for="message">Mensagem <span class="required">*</span></label>
            </div>
            <div class="field">
                <textarea name="message" id="message"></textarea>
                <div class="align-right font-small">Máximo <?= config('helpdesk.max_char_message', 400) ?> caracteres</div>
            </div>
        </div>
    
    </div>
    <div class="submit">
        <input type="submit" value="Abrir ticket" class="btn" />
    </div>
</form>