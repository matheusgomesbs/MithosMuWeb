<div class="box">
    <h1>Painel de controle</h1>
        <? if (isset($error)): ?>
            <div class="flash flash-error"><?= $error ?></div>
        <? endif ?>
        <form action="<?= url_to('/admin/login') ?>" method="post">
            <div class="input text">
                <label for="usuario">Usuário</label>
                <input name="username" type="text" id="usuario" />
            </div>
            <div class="input password">
                <label for="password">Senha</label>
                <input name="password" value="" type="password" id="password" />
            </div>
            <div class="submit">
                <input type="submit" value="Acessar painel de controle" />
            </div>
        </form>
    </div>
</div>