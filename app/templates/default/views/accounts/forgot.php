<h1 class="title">Recuperar senha</h1>

<h2 class="title">ads</h2>
<form data-ajax action="<?= url_to('/forgot') ?>" class="form" method="post">
    <div class="box-panel">
        <div class="box-panel-content">
            <div class="row">
                <div class="label">
                    <label for="username">Nome de usuário <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" id="username" name="username" maxlength="10" style="width:100px" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="email">E-Mail <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" id="email" name="email" style="width:300px" />
                </div>
            </div>
            <div class="row">
                <div class="label"></div>
                <div class="field">
                    <div class="captcha">
                        <img src="<?= static_to('/captcha?t=' . time()) ?>" height="70" width="200" />
                        <a href="#" class="reload-captcha">reload</a>
                        <input type="text" name="captcha" id="captcha" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit">
        <input type="submit" class="btn" value="Recuperar">
    </div>
</form>