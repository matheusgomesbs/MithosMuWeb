<form data-ajax class="form" action="<?= url_to('/admin/configs/general') ?>" method="post">
    <div class="fields">
        <fieldset>
            <legend>Site</legend>
            <div class="row">
                <div class="label">
                    <label for="config-site-title">Título:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-site-title" value="<?= config('site.title') ?>" name="site_title" />
                </div>
            </div>
        </fieldset>
        
        <fieldset>
            <legend>Servidor</legend>
            <div class="row">
                <div class="label">
                    <label for="config-server-name">Nome:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-server-name" value="<?= config('server.name') ?>" name="server_name" />
                </div>
            </div>          
            <div class="row">
                <div class="label">
                    <label for="config-server-version">Versão aprox.:</label>
                </div>
                <div class="field">
                    <? $versions = array(1 => '0.97', 2 => '0.99', 3 => '1.02') ?>
                    <select id="config-server-version" name="server_version">
                        <? foreach ($versions as $key => $value): ?>
                            <option value="<?= $key ?>"<?= $key == config('server.version') ? ' selected="selected"' : '' ?>><?= $value ?></option>
                        <? endforeach ?>
                    </select>
                </div>
            </div>  
            <div class="row">
                <div class="label">
                    <label for="config-server-version-name">Nome versão:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-server-version-name" value="<?= config('server.version_name') ?>" name="server_version_name" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-server-experience">Experiência:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-server-experience" value="<?= config('server.experience') ?>" name="server_experience" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-server-drop">Drop:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-server-drop" value="<?= config('server.drop') ?>" name="server_drop" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-server-max-level">Max level:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-server-max-level" value="<?= config('server.max_level') ?>" name="server_max_level" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-server-max-status">Max status:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-server-max-status" value="<?= config('server.max_status') ?>" name="server_max_status" />
                </div>
            </div>
        </fieldset>
        
        <fieldset>
            <legend>SMTP</legend>
            <div class="row">
                <div class="label">
                    <label for="config-smtp-host">Servidor:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-smtp-host" value="<?= config('smtp.host') ?>" name="smtp_host" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-smtp-username">Usuário:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-smtp-username" value="<?= config('smtp.username') ?>" name="smtp_username" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-smtp-password">Senha:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-smtp-password" value="<?= config('smtp.password') ?>" name="smtp_password" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-smtp-port">Porta:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-smtp-port" value="<?= config('smtp.port') ?>" name="smtp_port" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-smtp-secure">SSL:</label>
                </div>
                <div class="field">
                    <input type="checkbox" id="config-smtp-secure"<?= config('smtp.secure') ? 'checked="checked"' : '' ?> value="1" name="smtp_secure" />
                </div>
            </div>
        </fieldset>
        
        <fieldset>
            <legend>Connect Server</legend>
            <div class="row">
                <div class="label">
                    <label for="config-connect-host">Servidor:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-connect-host" value="<?= config('connectserver.host') ?>" name="connect_host" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-connect-port">Porta:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-connect-port" value="<?= config('connectserver.port') ?>" name="connect_port" />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Join Server</legend>
            <div class="row">
                <div class="label">
                    <label for="config-join-host">Servidor:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-join-host" value="<?= config('joinserver.host') ?>" name="join_host" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-join-port">Porta:</label>
                </div>
                <div class="field">
                    <input type="text" id="config-join-port" value="<?= config('joinserver.port') ?>" name="join_port" />
                </div>
            </div>
        </fieldset>
        
        <fieldset>
            <legend>Sistema</legend>
            <div class="row">
                <div class="label">
                    <label for="config-debug">Debug:</label>
                </div>
                <div class="field">
                    <input type="checkbox" id="config-debug"<?= config('debug') ? 'checked="checked"' : '' ?> value="1" name="debug" />
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="config-debug">URL Rewrite:</label>
                </div>
                <div class="field">
                    <input type="checkbox" id="config-rewrite"<?= config('url_rewrite') ? 'checked="checked"' : '' ?> value="1" name="url_rewrite" />
                </div>
            </div>
        </fieldset>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>