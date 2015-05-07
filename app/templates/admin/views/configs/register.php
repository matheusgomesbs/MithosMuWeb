<form data-ajax class="form" action="<?= url_to('/admin/configs/register') ?>" method="post">
    <div class="fields">
        <fieldset>
            <legend>Informações básicas</legend>
            <div class="row">
                <div class="label">
                    <label for="config-news-limit">Perguntas secretas</label>
                </div>
                <div class="field container-add-secret-question">
                    <? foreach (config('register.secret_questions') as $question): ?>
                        <input type="text" style="margin-bottom:3px;" value="<?= $question ?>" name="secret_questions[]" />
                    <? endforeach ?>
                    <input type="text" name="secret_questions[]" />
                </div>
                <div style="text-align:right;margin-top:2px;margin-bottom:5px;">
                    <a class="button add-secret-question" href="javascript:void(0)">Adicionar novo</a>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="config-register-confirm_email">Conf. e-mail:</label>
                </div>
                <div class="field">
                    <input type="checkbox" id="config-register-confirm_email"<?= config('register.confirm_email') ? ' checked="checked"' : '' ?> name="confirm_email" />
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="config-register-blocked">Criar bloqueado:</label>
                </div>
                <div class="field">
                    <input type="checkbox" id="config-register-blocked"<?= config('register.create_blocked') ? ' checked="checked"' : '' ?> name="create_blocked" />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Bônus VIP</legend>

            <div class="row">
                <div class="label">
                    <label for="config-register-bonus_vip_type">VIP:</label>
                </div>
                <div class="field">
                    <select id="config-register-bonus_vip_type" name="bonus_vip_type">
                        <option value=""></option>
                        <? foreach (config('vip.types', []) as $key => $value): ?>
                            <option value="<?= $key ?>"<?= $key == config('register.bonus.vip.type') ? ' selected="selected"' : '' ?>><?= $value ?></option>
                        <? endforeach ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label for="config-register-bonus_vip_days">Dias:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-register-bonus_vip_days" name="bonus_vip_days" value="<?= config('register.bonus.vip.days') ?>" />
                </div>
            </div>
        </fieldset>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>