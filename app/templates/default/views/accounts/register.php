<h1 class="title">Cadastro</h1>

<h2 class="title">ddsads</h2>
<form data-ajax action="<?= url_to('/register') ?>" method="POST" class="form form-action">
    <div class="box-panel">
        <div class="box-panel-content">
            <div class="row">
                <div class="label">
                    <label for="name">Nome <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="name" id="name" style="width:250px" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="username">Usuário <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="username" maxlength="10" style="width:150px" id="username" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="password">Senha <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="password" name="password" maxlength="10" style="width:150px" id="password" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="repassword">Repita sua senha <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="password" name="repassword" maxlength="10" style="width:150px" id="repassword" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="email">E-Mail <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="email" id="email" style="width:250px" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="reemail">Repita seu E-Mail <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="reemail" id="reemail" style="width:250px" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="pid">Chave de segurança <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="pid" id="pid" style="width:100px" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="secret_question">Pergunta secreta <span class="required">*</span></label>
                </div>
                <div class="field">

                    <select name="secret_question" id="secret_question">
                        <? foreach (config('register.secret_questions') as $question): ?>
                            <option value="<?= $question ?>"><?= $question ?></option>
                        <? endforeach ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="secret_answer">Resposta secreta <span class="required">*</span></label>
                </div>
                <div class="field">
                    <input type="text" name="secret_answer" id="secret_answer" style="width:300px" />
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
        <input type="submit" value="Cadastrar" class="btn" />
    </div>
</form>