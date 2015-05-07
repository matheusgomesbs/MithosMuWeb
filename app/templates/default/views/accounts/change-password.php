<form data-ajax action="<?= url_to('/account/change-password') ?>" class="form" method="post">
    <div class="box-panel">
        <div class="box-panel-title">
            <div class="box-panel-title-left"></div>
            <div class="box-panel-title-content" style="width:348px">Alterar senha</div>
            <div class="box-panel-title-right"></div>
        </div>
        <div class="box-panel-content">
            <div class="box">
                <div class="row">
                    <div class="label">
                        <label for="current-password">Senha atual <span class="required">*</span></label>
                    </div>
                    <div class="field">
                        <input type="password" id="current-password" name="current_password" maxlength="10" style="width:100px" />
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="password">Novo senha <span class="required">*</span></label>
                    </div>
                    <div class="field">
                        <input type="password" id="password" name="password" style="width:100px" />
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="repassword">Nova senha <span class="required">*</span></label>
                    </div>
                    <div class="field">
                        <input type="password" id="repassword" name="repassword" style="width:100px" />
                    </div>
                </div>
            </div>

        </div>
        <div class="submit">
            <input type="submit" class="btn" value="Alterar">
        </div>
    </div>
</form>