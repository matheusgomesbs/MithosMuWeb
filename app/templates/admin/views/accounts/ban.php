<form data-ajax class="form" method="post" action="<?= url_to('/admin/accounts/ban') ?>">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="ban-account">Usuário: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $username ?>" name="account" id="ban-account" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="ban-cause">Motivo: <span class="required">*</span></label>
            </div>
            <div class="field">
                <textarea id="ban-cause" name="cause"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="ban-days">Dias bloqueio: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" class="date" name="days" style="width:30%" id="ban-days" /> dias
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Bloquear" />
    </div>
</form>